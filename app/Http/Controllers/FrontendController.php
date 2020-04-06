<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsletterRequest;
use Auth;
use App\Model\Frontend\Newsletter;
use App\Model\Frontend\Wishlist;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Brand;
use App\Model\Admin\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $sub_category = Subcategory::all();
        $product = Product::all();
        $slider = Product::where('main_slider', 1)->orderby('id', 'DESC')->first();

        $category_show = Category::limit(3)->skip(3)->get();
         
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        $featured = Product::where('status', 1)->orderby('id', 'DESC')->limit(20)->get();
        $trend = Product::where('status', 1)->where('trend',1)->orderby('id', 'DESC')->limit(20)->get();
        $hot = Product::where('status', 1)->where('hot_deal',1)->orderby('id', 'DESC')->limit(4)->get();
        $mid = Product::where('status', 1)->where('mid_slider',1)->orderby('id', 'DESC')->limit(5)->get();

        $bye_get = Product::where('status', 1)->where('buy_one_get_one',1)->orderby('id', 'DESC')->limit(12)->get();
        
        return view('pages.index', compact('category', 'sub_category', 'product', 'slider', 'featured', 'trend', 'bye_get', 'hot', 'mid', 'category_show', 'wishlist'));
    }

    public function store_newsletter(NewsletterRequest $request)
    {
        $newsletter = new Newsletter;

        $newsletter->email = $request->email;
        $newsletter->save();

        $notification = array(
            'messege' => 'Thanks For Subscribing',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
