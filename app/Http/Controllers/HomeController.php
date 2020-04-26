<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Frontend\Wishlist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $wishlist = Wishlist::where('user_id', Auth::id())->get();
      $category = Category::all();
      $sub_category = Subcategory::all();
      
      return view('home', compact('category', 'sub_category', 'wishlist'));
    }

    public function changePassword()
    {
      $category = Category::all();
      $wishlist = Wishlist::where('user_id', Auth::id())->get();
      $sub_category = Subcategory::all();
      $cart = Cart::content();

      return view('auth.changepassword', compact('category', 'sub_category', 'wishlist', 'cart'));
    }

    public function updatePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

    }

    public function Logout()
    {
        // $logout= Auth::logout();
      Auth::logout();
      $notification=array(
          'messege'=>'Successfully Logout',
          'alert-type'=>'success'
            );
        return Redirect()->route('login')->with($notification);
    }
}
