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

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart = Cart::content();
        $setting = Setting::first();
        $charge = $setting->shapping_charge;

        return view('pages.payment', compact('category', 'sub_category', 'wishlist', 'cart', 'charge'));
    }

    public function payment(Request $request)
    {
        $payment = $request->payment;
        echo "$payment";
        // return view('pages.payment', compact('category', 'sub_category', 'wishlist', 'cart', 'charge'));
    }
}
