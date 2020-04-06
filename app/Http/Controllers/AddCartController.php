<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Cart;
use App\Model\Admin\Product;

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
}
