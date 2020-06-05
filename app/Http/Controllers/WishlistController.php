<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use Cart;
use App\Model\Frontend\Wishlist;
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\SiteSetting;

class WishlistController extends Controller
{
    public function addwishlist($id)
    {
    	if (Auth::check()) {
            $userid = Auth::id();
    	    $check = Wishlist::where('user_id', $userid)->where('product_id',$id)->first();

    		if ($check) {
                return response()->json(['error' => 'Already On Wishlist']);       
            }
            else {
                $wishlist = new Wishlist;
                $wishlist->user_id = $userid;
                $wishlist->product_id = $id;
                $wishlist->save();

                return response()->json(['success' => 'Successfully Added To Wishlist']);   		
    		}
        }
        else {
            return response()->json(['error' => 'Please Login First']);        
    	}
    }

    public function show()
    {
        $setting = SiteSetting::first();
        $category = Category::all();
        $sub_category = Subcategory::all();
        $cart = Cart::content();

        $userid = Auth::id();
        $wishlist = Wishlist::where('user_id', $userid)->get();

        return view('pages.wishlist', compact('setting', 'category', 'sub_category', 'cart', 'wishlist'));

        // return response()->json($wishlist);
    }


}
