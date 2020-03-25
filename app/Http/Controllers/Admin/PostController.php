<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;

use App\Model\Admin\PostCategory;
use App\Model\Admin\Post;

use App\Http\Requests\Admin\Post\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $category =  PostCategory::all();
        // dd($category);
        return view('admin.blog.create', compact('category'));
    }

    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->post_category_id = $request->post_category_id;
        $post->post_title_en = $request->post_title_en;
        $post->post_title_bn = $request->post_title_bn;
        // $post->post_image = $request->post_image;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;

        $image = $request->post_image;
        if($image) {
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('public/media/post/'.$image_name);
            $post->post_image = 'public/media/post/'.$image_name;

            $post->save();

            $notification = array(
                'messege' => 'Post Insert Successfull With Image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $post->post_image = '';

            $post->save();

            $notification = array(
                'messege' => 'Post Insert Successfull Without Image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function index()
    {
        $post = Post::all();
        // dd($post);
        return view('admin.blog.index', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $image = $post->post_image;
        if($image) {
            unlink($image);
        }

        Post::destroy($id);

        $notification = array(
            'messege' => 'Post Delete Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $category =  PostCategory::all();

        return view('admin.blog.edit', compact('post', 'category'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->post_category_id = $request->post_category_id;
        $post->post_title_en = $request->post_title_en;
        $post->post_title_bn = $request->post_title_bn;
        // $post->post_image = $request->post_image;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;

        $old_image = $request->old_post_image;
        // dd($old_image);
        $image = $request->post_image;

        if($image) {
            if($old_image) {
                unlink($old_image);
            }
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('public/media/post/'.$image_name);
            $post->post_image = 'public/media/post/'.$image_name;

            $post->update();

            $notification = array(
                'messege' => 'Post Update Successfull',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog_post')->with($notification);
        }
        else {
            $post->post_image = $old_image;

            $post->update();

            $notification = array(
                'messege' => 'Post Update Successfull',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog_post')->with($notification);
        }
    }


}
