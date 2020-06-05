<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Mail;
use App\Mail\CancelOrderMail;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Frontend\Wishlist;
use App\Model\Frontend\Order;
use App\Model\Frontend\Shipping;
use App\Model\Admin\SiteSetting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $setting = SiteSetting::first();
      $wishlist = Wishlist::where('user_id', Auth::id())->get();
      $category = Category::all();
      $sub_category = Subcategory::all();

      $order = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
      
      return view('home', compact('setting', 'category', 'sub_category', 'wishlist', 'order'));
    }

    public function changePassword()
    {
      $setting = SiteSetting::first();
      $category = Category::all();
      $wishlist = Wishlist::where('user_id', Auth::id())->get();
      $sub_category = Subcategory::all();
      $cart = Cart::content();

      return view('auth.changepassword', compact('setting', 'category', 'sub_category', 'wishlist', 'cart'));
    }

    public function updatePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

    }

    public function Logout()
    {
        // $logout= Auth::logout();
      Auth::logout();
      $notification=array(
          'messege'=>'Successfully Logout',
          'alert-type'=>'success'
            );
        return Redirect()->route('login')->with($notification);
    }

    public function cancelOrder($id)
    {
      Order::where('id', $id)->update(['status' => 4]);
      
      $shipping = Shipping::where('order_id', $id)->get();
      $order = Order::where('id', $id)->get();

      //mail send to user
      Mail::to($shipping[0]->ship_email)->send(new CancelOrderMail($order, $shipping));
      
      $notification = array(
          'messege' => 'Order Canceled',
          'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    }

    public function returnOrder($id)
    {
      // dd($id);
      Order::where('id', $id)->update(['return_order' => 1]);

      $notification = array(
          'messege' => 'Order Return Request Send',
          'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    }
}
