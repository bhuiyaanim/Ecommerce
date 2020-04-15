<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Cart;
use Auth;
use Session;
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Frontend\Wishlist;
use App\Model\Admin\Setting;
use App\Model\Admin\coupon;

class AddCartController extends Controller
{
    public function addcart($id)
    {
        $product = Product::where('id', $id)->first();

        $data=array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;          
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added To Cart']);
        }
        else{
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;          
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;  
            $data['options']['color'] = '';
            $data['options']['size'] = ''; 
            
            Cart::add($data);  
            return response()->json(['success' => 'Successfully Added To Cart']);   
        }
    }

    public function check()
    {
    	$content=Cart::content();
    	return response()->json($content);
    }

    public function show()
    {
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart = Cart::content();

        return view('pages.cart', compact('cart', 'category', 'sub_category', 'wishlist'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $rowId = $request->product_id;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        return redirect()->back();
    }

    public function insertCart(Request $request)
    {
        $id = $request->product_id;
        
        $product = Product::where('id', $id)->first();

        $data=array();
        
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;          
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            
            $notification = array(
                'messege'=>'Successfully Added To Cart',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;          
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;  
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size; 
            
            Cart::add($data);  
            $notification = array(
                'messege'=>'Successfully Added To Cart',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function checkout()
    {
        if (Auth::check()) {
            $category = Category::all();
            $sub_category = Subcategory::all();
            $wishlist = Wishlist::where('user_id', Auth::id())->get();
            
            $cart = Cart::content();
            $setting = Setting::first();
            $charge = $setting->shapping_charge;
            
            return view('pages.checkout', compact('cart', 'charge', 'category', 'sub_category', 'wishlist'));
        }
        else {
            $notification = array(
                'messege'=>'Pleass Login First',
                'alert-type'=>'success'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function update_checkout(Request $request)
    {
        $rowId = $request->product_id;
        $qty = $request->qty;

        Cart::update($rowId, $qty);

        if (Session::has('coupon'))
        {
            $coupon_name = Session::get('coupon')['name'];
            $coupon_discount = Session::get('coupon')['discount_pr'];
            
            $Subtotal = \Cart::Subtotal(2,'.','');
            $discount = $coupon_discount / 100;
            
            Session::put('coupon', [
                'name' => $coupon_name,
                'discount_pr' => $coupon_discount,
                'discount_am' => $Subtotal * $discount,
                'balance' => $Subtotal - ($Subtotal * $discount),
            ]);
        }
        return redirect()->back();
    }

    public function apply_coupon(Request $request)
    {
        $coupon = $request->coupon;
        $check = coupon::where('coupon', $coupon)->first();

        $Subtotal = \Cart::Subtotal(2,'.','');
        $discount = $check->discount / 100;

        if ($check) {
            Session::put('coupon', [
                'name' => $request->coupon,
                'discount_pr' => $check->discount,
                'discount_am' => $Subtotal * $discount,
                'balance' => $Subtotal - ($Subtotal * $discount),
            ]);
            $notification = array(
                'messege'=>'Successfuly Coupon Applied',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'messege'=>'Invalid Coupon',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function remove_coupon()
    {
        Session::forget('coupon');
        $notification = array(
            'messege'=>'Successfuly Coupon Removed',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    

}
