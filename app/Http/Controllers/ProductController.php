<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use Cart;
use Response;
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Frontend\Wishlist;

class ProductController extends Controller
{
    public function details($id, $product_name)
    {
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        $product = Product::where('id', $id)->first();

        $color=$product->product_color;
    	$product_color = explode(',', $color);

    	$size=$product->product_size;
    	$product_size = explode(',', $size);
        
        return view('pages.product_details', compact('product', 'product_color', 'product_size', 'category', 'sub_category', 'wishlist'));
    }

    public function addcart(Request $request, $id)
    {
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
            
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        }
        else{
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty'] = $request->qty; 
            $data['price']= $product->discount_price;          
            $data['weight']=1;
            $data['options']['image']=$product->image_one;  
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size; 
            
            Cart::add($data);
            
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        }
    }

    public function viewProduct($id)
    {
        $product = Product::join('categories','products.category_id','categories.id')
                            ->join('subcategories','products.sub_category_id','subcategories.id')
                            ->join('brands','products.brand_id','brands.id')
                            ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                            ->where('products.id',$id)->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);
        // return response()->json($color);
        
        $size = $product->product_size;
        $product_size = explode(',', $size);
        
        // return response()->json($product_color);
        return response::json(
            array(
                'product' => $product,
                'color' => $product_color,
                'size' => $product_size,
            )
        );
    }

}
