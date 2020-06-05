@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Cart -->

<div class="cart_section pt-4 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Order Track</div>
                    <div class="cart_items">
                        <ul class="cart_list mb-4" style="padding:15px">
                            <div class="contact_form_container">
                                <div class="contact_form_title text-center mb-4">
                                    <h3>Your Order Status</h3>
                                </div>
        
                                <div class="progress mb-3">
                                    @if($track->status == 0 )
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($track->status == 1)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($track->status == 2)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($track->status == 3)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>                                                
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><br>
                                    @endif
                                </div>
                        
                                @if($track->status == 0)
                                    <h4>Note: <strong>Payment Request Under Processing</strong></h4>
                                @elseif($track->status == 1)
                                    <h4>Note: <strong>Payment Accepted, Waiting For Packing</strong></h4>
                                @elseif($track->status == 2)
                                    <h4>Note: <strong>Packing Done, Waiting  For Shipping </strong></h4>
                                @elseif($track->status == 3)
                                    <h4>Note: <strong>Your Order has been Successfully Delevered</strong></h4>
                                @else
                                    <h4>Note: <strong>Order Cancel</strong></h4>
                                @endif
                                 
                            </div>
                        </ul>

                        <ul class="cart_list mb-4">
                            @foreach ($product as $product)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image pt-3">
                                        <img src="{{ asset($product->product->image_one) }}" style="height:100px;">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $product->product->product_name }}</div>
                                        </div>

                                        @if ($product->color == NULL)
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">
                                                    {{ $product->color }}
                                                </div>
                                            </div>
                                        @endif

                                        @if ($product->size == NULL)    
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">
                                                    {{ $product->size }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">
                                                {{ $product->quantity }}
                                            </div>
                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Payment Type</div>
                                            <div class="cart_item_text">
                                                {{ $track->payment_type }}
                                            </div>
                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Unit Price</div>
                                            <div class="cart_item_text">
                                                {{ $product->unitPrice }}
                                            </div>
                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Total Price</div>
                                            <div class="cart_item_text">
                                                {{ $product->unitPrice * $product->quantity }}
                                            </div>
                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Order Date</div>
                                            <div class="cart_item_text">
                                                {{ $track->date }}
                                            </div>
                                        </div>

                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Order Month</div>
                                            <div class="cart_item_text">
                                                {{ $track->month }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        
                        {{-- <div class="pt-2 pb-2"></div> --}}
                        
                        <ul class="cart_list">
                            <li class="list-group-item">Subtotal : 
                                <span style="float: right;">
                                    Tk {{ $track->subtotal }}
                                </span>
                            </li>
                            <li class="list-group-item">Shipping : 
                                <span style="float: right;">
                                    Tk {{ $track->shipping }}
                                </span>
                            </li>
                            @if($track->vat == 0)
                            @else
                            <li class="list-group-item">Vat : 
                                <span style="float: right;">
                                    Tk {{ $track->vat }}
                                </span>
                            </li>
                            @endif
                            <li class="list-group-item">Total : 
                                <span style="float: right;">
                                    Tk {{ $track->total }}
                                </span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection