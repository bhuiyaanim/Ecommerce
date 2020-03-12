<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;

use App\Model\Admin\Category;
use App\Model\Admin\Brand;
use App\Model\Admin\Subcategory;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\BrandRequest;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Http\Requests\Admin\Category\Sub_CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $category = Category::all();

        return view('admin.category.category', compact('category'));
    }

    public function store_category(CategoryRequest $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;
        $category->save();

        $notification = array(
            'messege' => 'Successfully Category Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function delete_category($id)
    {
        Category::destroy($id);

        $notification = array(
            'messege' => 'Category Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit_category', compact('category'));
    }

    public function update_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:55',
        ]);

        $update = Category::find($request->id)->update(['category_name' => $request->category_name]);
        
        if($update){
            $notification = array(
                'messege' => 'Category Update Successfull',
                'alert-type' => 'success'
            );
            return redirect()->route('categories')->with($notification);
        }
        else{
            $notification = array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'success'
            );
            return redirect()->route('categories')->with($notification);
        }
    }

    public function brand()
    {
        $brand = Brand::all();

        return view('admin.category.brand', compact('brand'));
    }

    public function store_brand(BrandRequest $request)
    {
        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            
            $brand->brand_logo = $image_url;
            $brand->save();

            $notification = array(
                'messege' => 'Successfully Brand Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);                      
        }
        else{
            $brand->save();

            $notification=array(
                'messege' => 'Done!',
                'alert-type' => 'success'
                );
            return Redirect()->back()->with($notification); 
        }
    }

    public function delete_brand($id)
    {
        $brand = Brand::get()->where('id', $id)->first();
        unlink($brand->brand_logo);
        Brand::destroy($id);

        $notification = array(
            'messege' => 'Brand Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editbrand($id)
    {
        $brand = Brand::find($id);

        return view('admin.category.edit_brand', compact('brand'));
    }

    public function update_brand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|max:55',
            'brand_logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $old_logo = $request->old_logo;
        $brand = new Brand();
        $brand->brand_name = $request->brand_name; 
        $image = $request->file('brand_logo');

        if ($image) {
            unlink($old_logo);
            $image_name= date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $brand->brand_logo = $image_url;
            Brand::find($request->id)->update(['brand_name' => $request->brand_name, 'brand_logo' => $brand->brand_logo]);
            $notification=array(
                'messege' => 'Brand Update Successfull',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification);                      
        }
        else{
            Brand::find($request->id)->update(['brand_name' => $brand->brand_name]);
            $notification=array(
                'messege' => 'Brand Update Done!',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification); 
        }
    }

    public function sub_category()
    {
        $category = Category::all();
        $sub_category = DB::table('subcategories')
                        ->join('categories', 'subcategories.category_id', 'categories.id')
                        ->select('subcategories.*', 'categories.category_name')
                        ->get();
        // dd($sub_category);

        return view('admin.category.sub_category', compact('category', 'sub_category'));   
    }

    public function store_sub_category(Sub_CategoryRequest $request)
    {
        $sub_category = new Subcategory();

        $sub_category->category_id = $request->category_id;
        $sub_category->subcategory_name = $request->subcategory_name;
        $sub_category->save();

        $notification = array(
            'messege' => 'Successfully Sub-Category Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function delete_sub_category($id)
    {
        Subcategory::destroy($id);

        $notification = array(
            'messege' => 'Sub-Category Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
