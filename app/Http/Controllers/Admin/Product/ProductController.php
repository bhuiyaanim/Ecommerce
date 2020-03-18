<?php

namespace App\Http\Controllers\Admin\Product;

use Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;

use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Brand;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $product = Product::all();

        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();

        return view('admin.product.create', compact('category', 'brand'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->trend = $request->trend;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->status = 1;
        
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two && $image_three)
        {
            $image_name_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/'.$image_name_one);
            $product->image_one = 'public/media/product/'.$image_name_one;
            
            $image_name_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/'.$image_name_two);
            $product->image_two = 'public/media/product/'.$image_name_two;

            $image_name_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('public/media/product/'.$image_name_three);
            $product->image_three = 'public/media/product/'.$image_name_three;

            $product->save();

            $notification = array(
                'messege' => 'Successfully Product Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function inactive($id)
    {
        Product::find($id)->update(['status' => 0]);

        $notification = array(
            'messege' => 'Product Successfully Inactivated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Product::find($id)->update(['status' => 1]);

        $notification = array(
            'messege' => 'Product Successfully Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        
        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;
        unlink($image_one);
        unlink($image_two);
        unlink($image_three);

        Product::destroy($id);
        
        $notification = array(
            'messege' => 'Product Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function view($id)
    {
        $product = Product::find($id);
        
        return view('admin.product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        
        return view('admin.product.edit', compact('product'));
    }

    // sub-category ajax request
    public function get_sub_category($category_id)
    {
        $sub_category = Subcategory::get()->where("category_id", $category_id);

        return json_encode($sub_category);
    }
}
