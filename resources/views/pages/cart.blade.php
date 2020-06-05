@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Cart -->

<div class="cart_section mt-2 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
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
                                                <form action="{{ route('update.cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $cart->rowId }}">
                                                    <input type="hidden" name="p_id" value="{{ $cart->id }}">
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
                    
                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Tk{{ Cart::subtotal() }}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <button type="button" class="btn btn-secondary btn-lg">All Cancel</button>
                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection