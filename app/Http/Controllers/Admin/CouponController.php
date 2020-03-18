<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Model\Admin\Coupon;
use App\Model\Frontend\Newsletter;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CouponRequest;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon()
    {
        $coupon = Coupon::all();

        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function store_coupon(CouponRequest $request)
    {
        $coupon = new Coupon;

        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification = array(
            'messege' => 'Successfully Coupon Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete_coupon($id)
    {
        Coupon::destroy($id);

        $notification = array(
            'messege' => 'Coupon Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit_coupon($id)
    {
        $coupon = Coupon::find($id);

        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function update_coupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required|max:55',
            'discount' => 'required|max:55',
        ]);

        Coupon::find($request->id)->update(['coupon' => $request->coupon, 'discount' => $request->discount]);
        
        $notification = array(
            'messege' => 'Coupon Update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupon')->with($notification);
    }

    public function newsletter()
    {
        $newsletter = Newsletter::all();

        return view('admin.coupon.newsletter', compact('newsletter'));
    }

    public function delete_newsletter($id)
    {
        Newsletter::destroy($id);

        $notification = array(
            'messege' => 'Subscriber Delete Successful',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}