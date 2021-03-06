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
use App\Model\Admin\SiteSetting;

class ProductController extends Controller
{
    public function details($id, $product_name)
    {
        $setting = SiteSetting::first();
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart = Cart::content();

        $product = Product::where('id', $id)->first();

        $color=$product->product_color;
    	$product_color = explode(',', $color);

    	$size=$product->product_size;
    	$product_size = explode(',', $size);
        
        return view('pages.product_details', compact('product', 'product_color', 'product_size', 'setting', 'category', 'sub_category', 'wishlist', 'cart'));
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
        
        $size = $product->product_size;
        $product_size = explode(',', $size);
        
        return response::json(
            array(
                'product' => $product,
                'color' => $product_color,
                'size' => $product_size,
            )
        );
    }

    public function show($id, $cat_id)
    {
        $header = Category::where('id', $cat_id)->get();
        $setting = SiteSetting::first();
        $category = Category::all();
        $sub_category = Subcategory::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        // $cart = Cart::content();

        $product = Product::where('sub_category_id', $id)->paginate(30);
        $sub_cat = Subcategory::where('category_id', $cat_id)->get();
        
        $count = $product->count();
        $brand = Product::where('sub_category_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        return view('pages.all_product', compact('product', 'count', 'sub_cat', 'brand', 'setting', 'category', 'sub_category', 'wishlist', 'header'));
        
        
    }

}
