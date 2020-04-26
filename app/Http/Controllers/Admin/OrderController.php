<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Frontend\Order;
use App\Model\Frontend\Shipping;
use App\Model\Frontend\OrderDetails;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newOrder()
    {
        $order = Order::where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function viewOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $shipping = Shipping::where('order_id', $order->id)->first();
        $details = OrderDetails::where('order_id', $order->id)->get();
        dd($details);
    }
}
