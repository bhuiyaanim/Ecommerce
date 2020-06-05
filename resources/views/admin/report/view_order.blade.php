@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display&display=swap" rel="stylesheet"> 

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        @if ($path == 'search')
            <a class="breadcrumb-item" href="{{ route('search.report') }}">Search Report</a>
        @elseif($path == 'order')
            @if($order->status == 0)
                <a class="breadcrumb-item" href="{{ route('todays.order') }}">Today's Order</a>
            @elseif($order->status == 3)  
                <a class="breadcrumb-item" href="{{ route('todays.delivery') }}">Today's Delivery</a>
            @endif
        @endif
        
        <span class="breadcrumb-item active">Order Details</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Order Details</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body-title mb-2">Order Details</div>
                    <table class="table">
                            <tr>
                                <th>Name: </th>
                                <th>{{ $order->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment: </th>
                                <th>{{ $order->payment_type }}</th>
                            </tr>
                            <tr>
                                <th>Payment ID: </th>
                                <th>{{ $order->payment_id }}</th>
                            </tr>
                            <tr>
                                <th>Total :</th>
                                <th>{{ $order->total }} Tk</th>
                            </tr>
                            <tr>
                                <th>Month : </th>
                                <th>
                                    {{ $order->month }}
                                </th>
                            </tr>
                            <tr>
                                <th>Date: </th>
                                <th>{{ $order->date }}</th>
                            </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="card-body-title mb-2">Shipping Details</div>
                    <table class="table">
                        <tr>
                            <th>Name: </th>
                            <th>{{ $shipping->ship_name }}</th>
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            <th>{{ $shipping->ship_phone }}</th>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <th>{{ $shipping->ship_email }}</th>
                        </tr>
                        <tr>
                            <th>Address: </th>
                            <th>{{ $shipping->ship_address }}</th>
                        </tr>
                        <tr>
                            <th>City :</th>
                            <th>{{ $shipping->ship_city }}</th>
                        </tr>
                         <tr>
                            <th>Status : </th>
                            <th>
                                @if($order->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($order->status == 1)
                                    <span class="badge badge-secondary">Payment Accept</span>
                                @elseif($order->status == 2) 
                                    <span class="badge badge-primary">Progress</span>
                                @elseif($order->status == 3)  
                                    <span class="badge badge-success">Delevered</span>
                                @else
                                    <span class="badge badge-danger">Canceled</span>
                                @endif
                            </th>
                        </tr>
                    </table> 
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-12">
                    <div class="card-body-title mb-2 mt-2">Product Details</div>
                    <div class="table-wrapper">
                        <table  class="table display responsive nowrap">
                        <thead>
                            <tr>
                            <th class="wd-5p">SL.</th>
                            <th class="wd-10p">Product ID</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-10p">Image</th>
                            <th class="wd-10p">Color </th>
                            <th class="wd-10p">Size</th>
                            <th class="wd-10p">Quantity</th>
                            <th class="wd-15p">Unit Price</th>
                            <th class="wd-15p">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->product->product_code }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td><img src="{{ URL::to($row->product->image_one) }}" height="50px;" width="50px;"></td>
                                <td>{{ $row->color }}</td>
                                <td>{{ $row->size }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>
                                    {{ $row->unitPrice }} Tk  
                                </td>
                                <td>
                                    {{ $row->totalPrice }} Tk
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div>
            </div>

            @if($order->status == 0)
                <strong> This Order Is Panding</strong>
            @elseif($order->status == 3)
                <strong class="text-success">This order has been succesfully delevered</strong>
            @endif

        </div>
    </div><!-- sl-pagebody -->
    
    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
        crossorigin="anonymous"></script>

    @endsection
