<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsletterRequest;

use Auth;
use App\Model\Frontend\Newsletter;
use App\Model\Frontend\Wishlist;
use App\Model\Frontend\Order;
use App\Model\Frontend\OrderDetails;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Brand;
use App\Model\Admin\Product;
use App\Model\Admin\SiteSetting;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();
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
        
        return view('pages.index', compact('setting', 'category', 'sub_category', 'product', 'slider', 'featured', 'trend', 'bye_get', 'hot', 'mid', 'category_show', 'wishlist'));
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

    public function orderTrack(Request $request)
    {
        $track = Order::where('status_code', $request->code)->first();

        if($track == null) {
            $notification = array(
                'messege' => 'Invalid Status Code',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $setting = SiteSetting::first();
            $wishlist = Wishlist::where('user_id', Auth::id())->get();
            $category = Category::all();
            $sub_category = Subcategory::all();

            $product = OrderDetails::where('order_id', $track->id)->get();
            
            return view('pages.track', compact('track', 'product', 'setting', 'category', 'sub_category', 'wishlist'));
        }
    }

    public function search(Request $request)
    {
        $setting = SiteSetting::first();
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        $item = $request->search;
        $products = Product::join('brands','products.brand_id','brands.id')
                            ->select('products.*','brands.brand_name')
                            ->join('categories','products.category_id','categories.id')
                            ->select('products.*','categories.category_name')
                            ->join('subcategories','products.sub_category_id','subcategories.id')
                            ->select('products.*','subcategories.subcategory_name')
                            ->where('product_name', 'like', '%'.$item.'%')
                            ->orWhere('brand_name', 'like', '%'.$item.'%')
                            ->orWhere('category_name', 'like', '%'.$item.'%')
                            ->orWhere('subcategory_name', 'like', '%'.$item.'%')
                            ->paginate(30);

        if(!$products->isEmpty())
        {
            $sub_cat = Subcategory::where('category_id', $products[0]->category_id)->get();
            $header = Category::where('id', $products[0]->category_id)->get();
            $count = $products->count();

            $brandIds = array();
            foreach($products as $p){
                if(!in_array($p->brand_id, $brandIds)){
                    $brandIds[] = $p->brand_id;
                }
            }

            $brands = array();
            foreach ($brandIds as $id) {
                $brands[] = Brand::where('id', $id)->get();
            }

            return view('pages.search', compact('products', 'count', 'setting', 'category', 'sub_category', 'wishlist', 'sub_cat', 'header', 'brands'));
        }
        else
        {
            $notification = array(
                'messege' => 'There Is Nothing Like '. $item .', Please Try Again With Somthing Else',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        

    }

}
