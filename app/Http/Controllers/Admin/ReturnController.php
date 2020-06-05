<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Frontend\Order;
use App\Model\Frontend\Shipping;
use App\Model\Frontend\OrderDetails;
use App\Model\Admin\Product;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function returnRequest()
    {
        $order = Order::where('return_order', 1)->get();
        $title = "Return Request";
        return view('admin.return.return', compact('order', 'title'));
    }

    public function viewReturn($id)
    {
        $order = Order::where('id', $id)->first();
        $shipping = Shipping::where('order_id', $order->id)->first();
        $details = OrderDetails::where('order_id', $order->id)->get();
        
        return view('admin.return.view_order', compact('order', 'shipping', 'details'));
    }

    public function approveReturn($id)
    {
        $orderDetails = OrderDetails::where('order_id', $id)->get();

        foreach ($orderDetails as $row) {
            $oldQ = Product::where('id', $row->product_id)->get();
            Product::where('id', $row->product_id)->update(['product_quantity' => $oldQ[0]->product_quantity + $row->quantity]);
        }

        Order::where('id', $id)->update(['return_order' => 2]);
        
        $notification = array(
            'messege' => 'Return Request Sucessfuly Approved',
            'alert-type' => 'success'
        );
        return redirect()->route('return.request')->with($notification);
    }

    public function cancelReturn($id)
    {
        Order::where('id', $id)->update(['return_order' => 3]);
        
        $notification = array(
            'messege' => 'Return Request Canceled',
            'alert-type' => 'success'
        );
        return redirect()->route('return.request')->with($notification);
    }

    public function allReturn()
    {
        $order = Order::where('return_order', 2)->orWhere('return_order', 3)->get();
        $title = "All Return";
        return view('admin.return.return', compact('order', 'title'));
    }
}
