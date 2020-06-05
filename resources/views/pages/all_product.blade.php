@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_responsive.css') }}">

<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{ $header[0]->category_name }}</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 pr-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories mt-2">
                            @foreach ($sub_cat as $sub_cat)
                                <li><a href="{{ route('product',['id' => $sub_cat->id, 'cat_id' => $sub_cat->category_id]) }}">{{ $sub_cat->subcategory_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @foreach ($brand as $brand)
                                <li class="brand"><a href="#">{{ $brand->brand->brand_name }}</a></li>                                
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                
                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{ $count }}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid row">
                        <div class="product_grid_border"></div>

                        @foreach ($product as $row)
                            <!-- Product Item -->
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($row->image_one) }}" alt=""></div>
                                <div class="product_content">
                                    <div class="product_price">
                                        @if ($row->discount_price == null)
                                            Tk {{ $row->selling_price }}
                                        @else
                                            Tk {{ $row->discount_price }} 
                                            <span>Tk {{ $row->selling_price }}</span>
                                        @endif
                                    </div>
                                    <div class="product_name">
                                        <div>
                                            <a href="{{ route('product.details', ['id' => $row->id, 'product_name' => $row->product_name]) }}">
                                                {{ $row->product_name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product_extras">
                                        <button class="product_cart_button addcart" id="{{ $row->id }}" data-toggle="modal"
                                            data-target="#cartModal" onclick="productView(this.id)">Add to Cart</button>
                                    </div>
                                </div>
                                <a class="addwishlist" data-id="{{ $row->id }}">
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </a>
                                {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                                <ul class="product_marks">
                                    @if ($row->discount_price == null)
                                        <li class="product_mark product_new">NEW</li>
                                    @else
                                        <li class="product_mark product_new" style="background: red">
                                            @php
                                                $discount = (1 - ($row->discount_price / $row->selling_price)) * 100;
                                            @endphp
                                            {{ intval($discount) }}%
                                        </li>
                                    @endif
                                </ul>
                            </div>    
                        @endforeach
                        

                        

                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        {{-- <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div> --}}
                        {{-- <ul class="page_nav d-flex flex-row"> --}}
                            {{ $product->links() }}
                        {{-- </ul> --}}
                        {{-- <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div> --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/shop_custom.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.addwishlist').on('click', function () {
            var id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: "{{  url('/add/wishlist/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }

                    },

                });
            } else {
                alert('danger');
            }
            e.preventDefault();
        });
    });

</script>

@endsection