<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Category\CategoryRequest;

use App\Model\Admin\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $category = Category::all();

        return view('admin.category.category', compact('category'));
    }

    public function storecategory(CategoryRequest $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;
        $category->save();

        $notification = array(
            'messege' => 'Category Insart Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function deletecategory($id)
    {
        Category::destroy($id);

        $notification = array(
            'messege' => 'Category Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editcategory($id)
    {
        $category = Category::get()->where('id', $id)->first();

        return view('admin.category.edit_category', compact('category'));
    }

    public function updatecategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:55',
        ]);

        // find($id)->update(['deleted' => 1])

        $update = Category::find($request->id)->update(['category_name' => $request->category_name]);
            // dd($update);
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
}
