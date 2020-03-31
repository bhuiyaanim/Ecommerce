<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsletterRequest;

use App\Model\Frontend\Newsletter;
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
        $slider = Product::where('main_slider', 1)->orderby('id', 'DESC')->first();

        $featured = Product::where('status', 1)->orderby('id', 'DESC')->limit(20)->get();
        $trend = Product::where('status', 1)->where('trend',1)->orderby('id', 'DESC')->limit(20)->get();
        $best = Product::where('status', 1)->where('best_rated',1)->orderby('id', 'DESC')->limit(20)->get();
        $hot = Product::where('status', 1)->where('hot_deal',1)->orderby('id', 'DESC')->limit(4)->get();
        $mid = Product::where('status', 1)->where('mid_slider',1)->orderby('id', 'DESC')->limit(5)->get();
        
        return view('pages.index', compact('category', 'sub_category', 'slider', 'featured', 'trend', 'best', 'hot', 'mid'));
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
