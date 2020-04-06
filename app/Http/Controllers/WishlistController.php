<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Model\Frontend\Wishlist;

class WishlistController extends Controller
{
    public function addwishlist($id)
    {
    	if (Auth::check()) {
            $userid = Auth::id();
    	    $check = Wishlist::where('user_id',$userid)->where('product_id',$id)->first();

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
}
