<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Frontend\Order;
use App\Model\Frontend\Shipping;
use App\Model\Frontend\OrderDetails;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function todaysOrder()
    {
        $date = date('d-m-y');
        $order = Order::where('status', 0)->orWhere('status', 1)->orWhere('status', 2)->where('date', $date)->get();
        $title = 'Pending';
        // dd($order);
        return view('admin.report.orders', compact('order', 'title'));
    }

    public function viewOrder($id, $url)
    {
        // dd($url);
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
        $path = $url;
        
        return view('admin.report.view_order', compact('order', 'shipping', 'details', 'quantity', 'path'));
    }

    public function todaysDelivery()
    {
        $date = date('d-m-y');
        $order = Order::where('status', 3)->where('date', $date)->get();
        $title = 'Delivered';

        return view('admin.report.orders', compact('order', 'title'));
    }

    public function monthsOrder()
    {
        $month = date('F');
        $order = Order::where('month', $month)->get();
        $title = 'All';
        
        return view('admin.report.orders', compact('order', 'title'));
    }

    public function searchReport()
    {
        // $date = date('d-m-y');
        $order = Order::get();
        // $visiblity = '';
        $visiblity = 'none';
        $display = '';

        return view('admin.report.search', compact('order', 'visiblity', 'display'));
    }

    public function searchByYear(Request $request)
    {
        $year = $request->year;
        $total = Order::where('status',3)->where('year',$year)->sum('total');
        $order = Order::where('status',3)->where('year',$year)->get();
        $visiblity = '';
        $display = 'none';
        // dd($total);
        return view('admin.report.search',compact('order','total', 'visiblity', 'display'));

    }

    public function searchByMonth(Request $request)
    {
        $month = $request->month;
        $total = Order::where('status',3)->where('month',$month)->sum('total');
        $order = Order::where('status',3)->where('month', 'April')->get();
        $visiblity = '';
        $display = 'none';
        // dd($order);
        return view('admin.report.search',compact('order','total', 'visiblity', 'display'));
    }

    public function searchByDate(Request $request)
    {
        $date = $request->date;
        $newdate = date("d-m-y", strtotime($date));
        $total = Order::where('status',3)->where('date',$newdate)->sum('total');
        $order = Order::where('status',3)->where('date',$newdate)->get();
        $visiblity = '';
        $display = 'none';

        return view('admin.report.search',compact('order','total', 'visiblity', 'display'));
    }
}
