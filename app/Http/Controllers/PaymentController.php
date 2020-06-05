<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Cart;
use Auth;
use Session;
use Mail;
use App\Mail\InvoiceMail;
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Setting;
use App\Model\Admin\coupon;
use App\Model\Frontend\Wishlist;
use App\Model\Frontend\Order;
use App\Model\Frontend\Shipping;
use App\Model\Frontend\OrderDetails;
use App\Model\Admin\SiteSetting;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $cart = Cart::content();
        if(!$cart->isEmpty())
        {
            $setting = SiteSetting::first();
            $category = Category::all();
            $sub_category = Subcategory::all();
            $wishlist = Wishlist::where('user_id', Auth::id())->get();
            $charge = Setting::first();
    
            return view('pages.payment', compact('setting', 'category', 'sub_category', 'wishlist', 'cart', 'charge'));
        }
        else
        {
            $notification = array(
                'messege'=>'Pleass Add Somthing First, To View Finalstep',
                'alert-type'=>'warning'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function payment(Request $request)
    {
        $setting = SiteSetting::first();
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart = Cart::content();
        $charge = Setting::first();

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        // dd($payment);

        if( $request->payment == 'stripe' )
        {
            return view('pages.payment.stripe', compact('data', 'setting', 'category', 'sub_category', 'wishlist', 'cart', 'charge'));
        }
        elseif ( $request->payment == 'paypal' )
        {

        }
        elseif ( $request->payment == 'ideal' )
        {

        }
        else
        {
            echo "Hand Cash";
        }
        // echo "$payment";


        // return view('pages.payment', compact('category', 'sub_category', 'wishlist', 'cart', 'charge'));
    }

    public function stripeCharge(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_KuP96hm2m5FzoKu1HXpGAo4g00fJ43HPzq');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $request->total * 100,
        'currency' => 'bdt',
        'description' => 'Dapple Park',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);
        
        // insert order details in order table
        $order = new Order;
        $order->user_id = Auth::id();
        $order->payment_type = $request->payment_type;
        $order->payment_id = $charge->payment_method;
        $order->paying_amount = $charge->amount / 100;
        $order->blnc_transection = $charge->balance_transaction;
        $order->stripe_order_id = $charge->metadata->order_id;
        if (Session::has('coupon')) {
            $order->subtotal = Session::get('coupon')['balance'];
        }
        else {
            $order->subtotal = \Cart::Subtotal(2,'.','');
        }
        $order->shipping = $request->shipping;
        $order->vat = $request->vat;
        $order->total = $request->total;
        $order->status = 0;
        $order->month = date('F');
        $order->date = date('d-m-y');
        $order->year = date('Y');
        $order->status_code = mt_rand(100000,999999);
        $order->save();

        
        // insert shipping details in shipping table
        $shipping = new Shipping;
        $shipping->order_id = $order->id;
        $shipping->ship_name = $request->ship_name;
        $shipping->ship_email = $request->ship_email;
        $shipping->ship_phone = $request->ship_phone;
        $shipping->ship_address = $request->ship_address;
        $shipping->ship_city = $request->ship_city;
        $shipping->save();


        // insert order details in order_details table        
        $content = Cart::content();        
        foreach ($content as $row) {
            $details = new OrderDetails;
            $details->order_id = $order->id;
            $details->product_id = $row->id;
            $details->product_name = $row->name;
            $details->color = $row->options->color;
            $details->size = $row->options->size;
            $details->quantity = $row->qty;
            $details->unitPrice = $row->price;
            $details->totalPrice = $row->qty * $row->price;
            $details->save();
        }
        
        //mail send to user
        Mail::to($request->ship_email)->send(new InvoiceMail($order, $shipping));

        // destroy cart & return to home page
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }
}
