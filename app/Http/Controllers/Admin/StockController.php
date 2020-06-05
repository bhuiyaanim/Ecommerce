<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\Product;
use App\Model\Frontend\Order;
use App\Model\Frontend\OrderDetails;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function stockView()
    {
        $product = Product::all();

        return view('admin.stock.index', compact('product'));
    }

    public function stockUpdate(Request $request)
    {
        $orderDetails = OrderDetails::where('product_id', $request->product_id)->get();
        
        $check = 0;

        for ($i=0; $i < $orderDetails->count(); $i++) {

            $order = Order::where('id', $orderDetails[$i]->order_id)->get();

            if($order[0]->status < 3)
            {
                $quantity = $orderDetails[$i]->quantity;
                $check = 1;
            }
        }

        if($check == 1)
        {
            if($request->quantity < $quantity)
            {
                $notification = array(
                    'messege' => 'You can not update this stock, due to pending order.',
                    'alert-type' => 'warning'
                );
            }
            elseif($request->quantity >=  $orderDetails[0]->quantity)
            {
                Product::where('id', $request->product_id)->update(['product_quantity' => $request->quantity]);
            
                $notification = array(
                    'messege' => 'Stock Updated',
                    'alert-type' => 'success'
                );
            }
        }
        elseif($check == 0)
        {
            Product::where('id', $request->product_id)->update(['product_quantity' => $request->quantity]);
            
            $notification = array(
                'messege' => 'Stock Updated',
                'alert-type' => 'success'
            );
        }
        
        return redirect()->route('product.list')->with($notification);
    }
}
