@extends('layouts.app')
@section('content')

@include('layouts.menubar')


<div class="contact_form pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 "  style="border-right: 1px solid grey; padding: 20px;">
                <div class="cart_container">
                    <div class="contact_form_title text-center">
                        <h3>Cart Products</h3>
                    </div>
                    
                    <div class="cart_items pb-5 mt-4">
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $cart)
                                    <li class="cart_item clearfix pr-1">
                                        
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between ml-4">
                                            <div class="cart_item_name cart_info_col pr-2">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text mt-4">{{ $cart->name }}</div>
                                            </div>
    
                                            @if ($cart->options->color == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col pr-3">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text mt-4">
                                                        {{ $cart->options->color }}
                                                    </div>
                                                </div>
                                            @endif
    
                                            @if ($cart->options->size == NULL)    
                                            @else
                                                <div class="cart_item_color cart_info_col pr-3">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text mt-4">
                                                        {{ $cart->options->size }}
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            
                                            <div class="cart_item_quantity cart_info_col pr-3">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text mt-4">{{ $cart->qty }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col pr-3">
                                                <div class="cart_item_title">Price(Tk)</div>
                                                <div class="cart_item_text mt-4">{{ $cart->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col pr-3">
                                                <div class="cart_item_title">Total(Tk)</div>
                                                <div class="cart_item_text mt-4">{{ $cart->price * $cart->qty }}</div>
                                            </div>
                                            
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="cart_items mt-5">
                        <ul>
                            @if(Session::has('coupon'))
                                <li class="list-group-item">Subtotal : 
                                    <span style="float: right;">
                                        Tk {{ Session::get('coupon')['balance'] }}
                                    </span>
                                </li>
                                <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }}) 
                                    {{-- <a href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">x</a> --}}
                                    <span style="float: right;">
                                        {{ Session::get('coupon')['discount_pr'] }} %
                                    </span>
                                </li>
                                <li class="list-group-item">Discount Amount :
                                    <span style="float: right;">
                                        - Tk {{ Session::get('coupon')['discount_am'] }}
                                    </span>
                                </li>
                            @else
                                <li class="list-group-item">Subtotal : 
                                    <span style="float: right;">
                                        Tk {{ Cart::Subtotal() }}
                                    </span>
                                </li>
                            @endif
            
                            <li class="list-group-item">Shipping Charge: 
                                <span style="float: right;">
                                    Tk {{ $charge }}
                                </span>
                            </li>
                            <li class="list-group-item">Vat : 
                                <span style="float: right;">
                                    0
                                </span>
                            </li>
                            @if(Session::has('coupon'))
                                <li class="list-group-item">Total: 
                                    <span style="float: right;"> 
                                        Tk {{ Session::get('coupon')['balance'] + $charge }}
                                    </span>
                                </li>
                            @else
                                <li class="list-group-item">Total: 
                                    <span style="float: right;">
                                        Tk {{ \Cart::Subtotal(2,'.','') + $charge }}
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 " style=" padding: 20px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">
                        <h3>Shipping Address</h3>
                    </div>

                    <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name </label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Full Name " name="name" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone </label>
                            <input type="text" class="form-control " name="phone"  aria-describedby="emailHelp" placeholder="Phone "  required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="text" class="form-control " name="email"   aria-describedby="emailHelp" placeholder="Email " required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="address" name="address" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="city" name="city" required="">
                        </div>
                        <div class="contact_form_title text-center pt-2 pb-2">
                            <h4>Payment By</h4>
                        </div>
                       <div class="form-group">
                            <ul class="logos_list text-center" >
                                <li><input type="radio" name="payment" value="stripe"> <img src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px; height: 80px;"></li>
                                <li><input type="radio" name="payment" value="paypal"> <img src="{{ asset('public/frontend/images/paypal.png') }}" style="width: 100px; height: 50px;"></li>
                                <li><input type="radio" name="payment" value="ideal"> <img src="{{ asset('public/frontend/images/mollie.png') }}" style="width: 100px; height: 100px;"></li>
                             </ul>
                        </div>
                        <div class="pt-2">
                            <div class="contact_form_button text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>



@endsection