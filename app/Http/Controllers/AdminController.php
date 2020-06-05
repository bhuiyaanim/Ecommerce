<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Model\Frontend\Order;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $date = date('d-m-y');
      $month = date('F');
      $year = date('Y');
      $tOrder = Order::where('date', $date)->where('status','!=', 4)->where('return_order','!=', 2)->sum('total');
      $tOrderG = Order::where('date', $date)->where('status','!=', 4)->where('return_order','!=', 2)->sum('subtotal');
      $tOrderT = Order::where('date', $date)->where('status','!=', 4)->where('return_order','!=', 2)->sum('vat');
      $tDelevery = Order::where('date', $date)->where('status', 3)->where('return_order','!=', 2)->sum('total');
      $tDeleveryG = Order::where('date', $date)->where('status', 3)->where('return_order','!=', 2)->sum('subtotal');
      $tDeleveryT = Order::where('date', $date)->where('status', 3)->where('return_order','!=', 2)->sum('vat');
      $mOrder = Order::where('month', $month)->sum('total');
      $mOrderG = Order::where('month', $month)->sum('subtotal');
      $mOrderT = Order::where('month', $month)->sum('vat');
      $yOrder = Order::where('year', $year)->where('status','!=', 4)->where('return_order','!=', 2)->sum('total');
      $yOrderG = Order::where('year', $year)->where('status','!=', 4)->where('return_order','!=', 2)->sum('subtotal');
      $yOrderT = Order::where('year', $year)->where('status','!=', 4)->where('return_order','!=', 2)->sum('vat');
      // dd($yOrderG);
      return view('admin.home', compact('tOrder', 'tOrderG', 'tOrderT', 'tDelevery', 'tDeleveryG', 'tDeleveryT', 'mOrder', 'mOrderG', 'mOrderT', 'yOrder', 'yOrderG', 'yOrderT'));
    }

    public function ChangePassword()
    {
      return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.login')->with($notification); 
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

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }

}
