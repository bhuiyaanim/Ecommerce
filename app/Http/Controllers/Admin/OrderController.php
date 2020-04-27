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
        $title = "Pending";
        return view('admin.order.pending', compact('order', 'title'));
    }

    public function viewOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $shipping = Shipping::where('order_id', $order->id)->first();
        $details = OrderDetails::where('order_id', $order->id)->get();

        $count = $details->count();
        if($count > 1)
        {
            $quantity = "product's";
        }
        else
        {
            if($details[0]->quantity > 1)
            {
                $quantity = "product's";
            }
            else
            {
                $quantity = "product";
            }
        }
        
        return view('admin.order.view_order', compact('order', 'shipping', 'details', 'quantity'));
    }

    public function paymentAccept($id)
    {
        Order::where('id', $id)->update(['status' => 1]);
        
        $notification = array(
            'messege' => 'Payment Accepted',
            'alert-type' => 'success'
        );
        return redirect()->route('new.order')->with($notification);
    }

    public function paymentCancel($id)
    {
        Order::where('id', $id)->update(['status' => 4]);

        $notification = array(
            'messege' => 'Order Canceled',
            'alert-type' => 'success'
        );
        return redirect()->route('new.order')->with($notification);
    }



    public function payedOrder()
    {
        $order = Order::where('status', 1)->get();
        $title = "Payed";
        return view('admin.order.pending', compact('order', 'title'));
    }

    public function deleveryProcess($id)
    {
        Order::where('id', $id)->update(['status' => 2]);
        
        $notification = array(
            'messege' => 'Send To Shipping',
            'alert-type' => 'success'
        );
        return redirect()->route('payed.order')->with($notification);
    }



    public function shippedOrder()
    {
        $order = Order::where('status', 2)->get();
        $title = "Shipped";
        return view('admin.order.pending', compact('order', 'title'));
    }

    public function deleveryDone($id)
    {
        Order::where('id', $id)->update(['status' => 3]);
        
        $notification = array(
            'messege' => 'Send To Shipping',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped.order')->with($notification);
    }



    public function deliveredOrder()
    {
        $order = Order::where('status', 3)->get();
        $title = "Delivered";
        return view('admin.order.pending', compact('order', 'title'));
    }

    public function canceledOrder()
    {
        $order = Order::where('status', 4)->get();
        $title = "Canceled";
        return view('admin.order.pending', compact('order', 'title'));
    }
    
}
