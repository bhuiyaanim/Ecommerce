<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use Cart;
use Session;
use App\Model\Admin\Post;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Frontend\Wishlist;

class BlogController extends Controller
{
    public function blog()
    {
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart = Cart::content();

        $post = Post::get();
        // dd($post);
        return view('pages.blog', compact('post', 'cart', 'category', 'sub_category', 'wishlist'));
        // return response()->json($post);
    }

    public function english()
    {
        Session::get('lang');
        session()->forget('lang');

        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function bangla()
    {
        Session::get('lang');
        session()->forget('lang');

        Session::put('lang', 'bangla');
        return redirect()->back();
    }
}
