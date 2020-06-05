@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Cart -->

<div class="cart_section mt-2 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Checkout</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($cart as $cart)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image pt-3">
                                        <img src="{{ asset($cart->options->image) }}" style="height:100px;">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $cart->name }}</div>
                                        </div>

                                        @if ($cart->options->color == NULL)
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">
                                                    {{ $cart->options->color }}
                                                </div>
                                            </div>
                                        @endif

                                        @if ($cart->options->size == NULL)    
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">
                                                    {{ $cart->options->size }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text pt-2">
                                                <form action="{{ route('update.checkout.cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="p_id" value="{{ $cart->id }}">
                                                    <input type="hidden" name="product_id" value="{{ $cart->rowId }}">
                                                    <input type="number" name="qty" value="{{ $cart->qty }}" pattern="[0-9]*" min="1" style="width:60px; height:30px;" required >
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></button>                                                
                                                </form>
                                            </div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price(Tk)</div>
                                            <div class="cart_item_text">{{ $cart->price }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total(Tk)</div>
                                            <div class="cart_item_text">{{ $cart->price * $cart->qty }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <div class="cart_item_text">
                                            <a class="btn btn-sm btn-danger" href="{{ route('remove.cart', $cart->rowId) }}">X</a>    
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="container">
                        <div class="row">
                            <!-- Coupon Apply -->
                            <div class="col-lg-6 pt-3 pl-2">
                                @if(Session::has('coupon'))
                                @else
                                <h5 class="ml-3">Apply Coupon</h5>
                                <form action="{{ route('apply.coupon') }}" method="post">
                                    @csrf
                                    <div class="form-group col-lg-4">
                                        <input type="text" class="form-control col-lg-20" name="coupon" placeholder="Coupon Code" style="width: 350px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-danger ml-3" style="width: 100px;">Submit</button>
                                </form>
                                @endif
                            </div>
                            <!-- Order Total -->
                            <div class="col-lg-6 pt-3">
                                <ul>
                                    @if(Session::has('coupon'))
                                        <li class="list-group-item">Subtotal : 
                                            <span style="float: right;">
                                                Tk {{ Session::get('coupon')['balance'] }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }}) 
                                            <a href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">x</a>
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
                                            Tk {{ $charge->shapping_charge }}
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
                                                Tk {{ Session::get('coupon')['balance'] + $charge->shapping_charge }}
                                            </span>
                                        </li>
                                    @else
                                        <li class="list-group-item">Total: 
                                            <span style="float: right;">
                                                Tk {{ \Cart::Subtotal(2,'.','') + $charge->shapping_charge }}
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                                <div class="cart_buttons mt-4">
                                    <a href="{{ route('show.cart') }}" class="btn btn-secondary btn-lg">Back</a>
                                    <a href="{{ route('payment') }}" class="btn btn-primary btn-lg">Final Step</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>


</div>

@endsection