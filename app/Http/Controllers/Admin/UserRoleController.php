<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Model\Admin\Admin;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allUser()
    {
        $user = Admin::where('type', 2)->get();
        return view('admin.role.role', compact('user'));
    }

    public function creatUser()
    {
        return view('admin.role.create');
    }

    public function storeUser(Request $request)
    {
        $user = new Admin;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->category = $request->category;
        $user->coupon = $request->coupon;
        $user->blog = $request->blog;
        $user->product = $request->product;
        $user->order = $request->order;
        $user->return = $request->return;
        $user->stock = $request->stock;
        $user->report = $request->report;
        $user->role = 0;
        $user->contact = $request->contact;
        // $user->comment = $request->comment;
        $user->setting = $request->setting;
        $user->other = $request->other;
        $user->type = 2;

        $user->save();

        $notification = array(
            'messege' => 'Sub-Admin Created Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editUser($id)
    {
        $user = Admin::find($id);
        // dd(Hash($user->password));
        return view('admin.role.edit', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $user = Admin::find($request->id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        
        $user->category = $request->category;
        $user->coupon = $request->coupon;
        $user->blog = $request->blog;
        $user->product = $request->product;
        $user->order = $request->order;
        $user->return = $request->return;
        $user->stock = $request->stock;
        $user->report = $request->report;
        $user->role = 0;
        // $user->contact = $request->contact;
        $user->comment = $request->comment;
        $user->setting = $request->setting;
        $user->other = $request->other;

        $user->update();

        $notification = array(
            'messege' => 'Update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->route('all.user')->with($notification);
    }

    public function deleteUser($id)
    {
        Admin::destroy($id);
        
        $notification = array(
            'messege' => 'User Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
