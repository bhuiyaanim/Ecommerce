@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Cart -->

<div class="cart_section mt-2 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Wishlist</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($wishlist as $list)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image pt-3">
                                        <img src="{{ asset($list->product->image_one) }}" style="height:100px;">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $list->product->product_name }}</div>
                                        </div>

                                        @if ($list->product->product_color == NULL)
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">
                                                    {{ $list->product->product_color }}
                                                </div>
                                            </div>
                                        @endif

                                        @if ($list->product->product_size == NULL)    
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">
                                                    {{ $list->product->product_size }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <div class="cart_item_text">
                                            <a class="btn btn-sm btn-danger" href="#">Add To Cart</a>    
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection