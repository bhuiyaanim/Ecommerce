@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Banner -->

<div class="banner">
    <div class="banner_background"
        style="background-image:url({{ asset('public/frontend/images/banner_background.jpg') }}"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img src="{{ asset($slider->image_one) }}" alt=""></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">{{ $slider->product_name }}</h1>
                    <div class="banner_price">
                        @if($slider->discount_price == null)
                        <h2>Tk {{ $slider->selling_price }}</h2>
                        @else
                        <span>Tk {{ $slider->selling_price }}</span>Tk {{ $slider->discount_price }}</div>
                    @endif
                    <div class="banner_product_name">{{ $slider->brand->brand_name }}</div>
                    <div class="button banner_button"><a href="#">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Characteristics -->

<div class="characteristics pb-3">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('public/frontend/images/char_1.png') }}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('public/frontend/images/char_2.png') }}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('public/frontend/images/char_3.png') }}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('public/frontend/images/char_4.png') }}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->

<div class="deals_featured mt-3">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                <!-- Deals -->
                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">
                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                            <!-- Deals Item -->
                            @foreach ($hot as $hot)
                            <div class="owl-item deals_item">
                                <div class="deals_image">
                                    <img src="{{ asset($hot->image_one) }}" class="rounded mx-auto" style="width:150px">
                                </div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a
                                                href="#">{{ $hot->category->category_name }}</a></div>
                                        @if ($hot->discount_price == null)
                                        <div class="deals_item_price ml-auto">Tk {{ $hot->selling_price }}</div>
                                        @else
                                        <div class="deals_item_price_a ml-auto">Tk {{ $hot->selling_price }}</div>
                                        @endif
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">
                                            <a href="{{ route('product.details', ['id' => $hot->id, 'product_name' => $hot->product_name]) }}"
                                                style="color:black;">
                                                {{ $hot->product_name }}
                                            </a>
                                        </div>
                                        @if ($hot->discount_price == null)
                                        @else
                                        <div class="deals_item_price ml-auto">Tk {{ $hot->discount_price }}</div>
                                        @endif
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available:
                                                <span>{{ $hot->product_quantity }}</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                        </div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                        </div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">New Featured</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                                <!-- Slider Item -->
                                @foreach ($featured as $featured)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div
                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{ route('product.details', ['id' => $featured->id, 'product_name' => $featured->product_name]) }}">
                                                <img src="{{ asset($featured->image_one) }}"
                                                    style="width:115px; hight:115px;">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price discount mt-4">
                                                @if ($featured->discount_price == null)
                                                Tk {{ $featured->selling_price }}
                                                @else
                                                Tk {{ $featured->discount_price }} 
                                                <span>Tk {{ $featured->selling_price }}</span>
                                                @endif
                                            </div>
                                            <div class="product_name mt-1">
                                                <div>
                                                    <a href="{{ route('product.details', ['id' => $featured->id, 'product_name' => $featured->product_name]) }}">
                                                        {{ $featured->product_name }}
                                                    </a>
                                                </div>
                                            </div>

                                        <div class="product_extras">
                                            <button class="product_cart_button addcart" id="{{ $featured->id }}" data-toggle="modal"
                                                data-target="#cartModal" onclick="productView(this.id)">Add to Cart</button>
                                        </div>


                                    </div>
                                    <a class="addwishlist" data-id="{{ $featured->id }}">
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    </a>
                                    <ul class="product_marks">
                                        @if ($featured->discount_price == null)
                                        <li class="product_mark product_discount" style="background: green">NEW</li>
                                        @else
                                        <li class="product_mark product_discount">
                                            @php
                                            $discount = (1 - ($featured->discount_price / $featured->selling_price)) *
                                            100;
                                            @endphp
                                            {{ intval($discount) }}%
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="featured_slider_dots_cover"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i
                                class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i
                                class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">
                        <!-- Popular Categories Item -->
                        @foreach ($category as $categorys)
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img
                                        src="{{ asset('public/frontend/images/popular_1.png') }}" alt=""></div>
                                <div class="popular_category_text">{{ $categorys->category_name }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<div class="banner_2">
    <div class="banner_2_background"
        style="background-image:url({{ asset('public/frontend/images/banner_2_background.jpg') }})"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            @foreach ($mid as $mid)
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">{{ $mid->category->category_name }}</div>
                                    <div class="banner_2_title">{{ $mid->product_name }}</div>
                                    <div class="banner_2_text">{{ $mid->brand->brand_name }}</div>
                                    <div class="banner_2_text">{{ $mid->product_code }}</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button">
                                        <a
                                            href="{{ route('product.details', ['id' => $mid->id, 'product_name' => $mid->product_name]) }}">
                                            Explore
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="{{ asset($mid->image_one) }}"
                                            class="rounded mx-auto" style="width:500px; hight:500px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach




        </div>
    </div>
</div>

<!-- Category Wise Product Show  -->
@foreach ($category_show as $row)
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{ $row->category_name }}</div>
                        <ul class="clearfix">
                            <li class="active"></li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="z-index:1;">
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    @foreach ($product as $item)

                                    @if ($row->id == $item->category_id)
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div
                                            class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <a
                                                    href="{{ route('product.details', ['id' => $item->id, 'product_name' => $item->product_name]) }}">
                                                    <img src="{{ asset($item->image_one) }}"
                                                        style="width:115px; hight:115px;">
                                                </a>
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price mt-4">
                                                    @if ($item->discount_price == null)
                                                    Tk {{ $item->selling_price }}
                                                    @else
                                                    Tk {{ $item->discount_price }} <span>Tk
                                                        {{ $item->selling_price }}</span>
                                                    @endif
                                                </div>
                                                <div class="product_name mt-1">
                                                    <div>
                                                        <a href="{{ route('product.details', ['id' => $item->id, 'product_name' => $item->product_name]) }}">
                                                            {{ $item->product_name }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button addcart" id="{{ $item->id }}" data-toggle="modal"
                                                        data-target="#cartModal" onclick="productView(this.id)">Add to Cart</button>
                                                </div>
                                            </div>

                                            <a class="addwishlist" data-id="{{ $item->id }}">
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            </a>
                                            <ul class="product_marks">
                                                @if ($item->discount_price == null)
                                                <li class="product_mark product_new">NEW</li>
                                                @else
                                                <li class="product_mark product_new" style="background: red">
                                                    @php
                                                    $discount = (1 - ($item->discount_price / $item->selling_price)) *
                                                    100;
                                                    @endphp
                                                    {{ intval($discount) }}%
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @else

                                    @endif
                                    @endforeach

                                </div>
                                {{-- <div class="arrivals_slider_dots_cover"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Adverts -->

<div class="adverts">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('public/frontend/images/adv_1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('public/frontend/images/adv_2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('public/frontend/images/adv_3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Trends -->

<div class="trends">
    <div class="trends_background"
        style="background-image:url({{ asset('public/frontend/images/trends_background.jpg') }})"></div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Bye One Get One</h2>
                    <div class="trends_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                    </div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">

                        <!-- Trends Slider Item -->
                        @foreach ($bye_get as $bye_get)
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <a
                                        href="{{ route('product.details', ['id' => $bye_get->id, 'product_name' => $bye_get->product_name]) }}">
                                        <img src="{{ asset($bye_get->image_one) }}" style="width:180px; hight:180px;">
                                    </a>
                                </div>
                                <div class="trends_content" style="height: 80px;">
                                    <div class="trends_category"><a href="#">{{ $bye_get->category->category_name }}</a>
                                    </div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name">
                                            <a
                                                href="{{ route('product.details', ['id' => $bye_get->id, 'product_name' => $bye_get->product_name]) }}">
                                                {{ $bye_get->product_name }}
                                            </a>
                                        </div>
                                        <br>
                                        <div class="trends_price pt-4">
                                            {{-- <div class="product_price"> --}}
                                            @if ($bye_get->discount_price == null)
                                            Tk {{ $bye_get->selling_price }}
                                            @else
                                            Tk {{ $bye_get->discount_price }}
                                            @endif
                                            {{-- </div> --}}
                                        </div>
                                        <br>
                                        <a class="btn btn-danger btn-sm addcart" id="{{ $bye_get->id }}" data-toggle="modal"
                                            data-target="#cartModal" onclick="productView(this.id)">Add to Cart</a>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    @if ($bye_get->discount_price == null)
                                    <li class="trends_mark trends_new">Extra One</li>
                                    @else
                                    <li class="trends_mark trends_new" style="background: red">
                                        @php
                                        $discount = (1 - ($bye_get->discount_price / $bye_get->selling_price)) * 100;
                                        @endphp
                                        {{ intval($discount) }}%
                                    </li>
                                    @endif
                                </ul>
                                <a class="addwishlist" data-id="{{ $item->id }}">
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </a>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Reviews -->

<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">

                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_2.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_3.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_2.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('public/frontend/images/review_3.jpg') }}" alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="reviews_dots"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_1.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_2.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_3.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225</div>
                                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_4.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_5.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/frontend/images/view_6.jpg') }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$375</div>
                                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">

                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_2.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_3.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_4.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_5.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_6.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_7.jpg') }}" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('public/frontend/images/brands_8.jpg') }}" alt=""></div>
                        </div>

                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png') }}" alt="">
                        </div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{ route('store.newsletter') }}" class="newsletter_form" method="POST">
                            @csrf
                            <input type="email" class="newsletter_input" name="email" required="required"
                                placeholder="Enter your email address">
                            <button class="newsletter_button" type="submit">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Cart Add Modal -->
<div class="modal fade " id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="" class="card-img-top" id="pimage" style="height: 240px;">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="card-title" id="pname"></h5></span>
                            </li>
                            <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                            <li class="list-group-item">Category: <span id="pcat"> </span></li>
                            <li class="list-group-item">SubCategory: <span id="psubcat"> </span></li>
                            <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
                            <li class="list-group-item">Stock: <span class="badge "
                                    style="background: green; color:white;">Available</span></li>
                        </ul>
                    </div>
                    <div class="col-md-4 ">
                        <form action="{{ route('insert.cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group mr-4" id="colordiv">
                                <label for="">Color</label>
                                <select name="color" class="form-control pr-2">
                                </select>
                            </div>
                            <div class="form-group mr-4" id="sizediv">
                                <label for="exampleInputEmail1">Size</label>
                                <select name="size" class="form-control" id="size">
                                </select>
                            </div>
                            <div class="form-group mr-3">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" class="form-control" value="1" name="qty" pattern="[0-9]*" min="1" required >
                            </div>
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ends -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.addwishlist').on('click', function () {
            var id = $(this).data('id');
            // var z = $('.test').text();
            // console.log(z);
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

<script type="text/javascript">
    function productView(id){
        $.ajax({
            url: "{{  url('/cart/product/view/') }}/"+id,
            type:"GET",
            dataType:"json",
            success:function(data) {
                // alert('Done');
                $('#pname').text(data.product.product_name);
                $('#pimage').attr('src',data.product.image_one);
                $('#pcat').text(data.product.category_name);
                $('#psubcat').text(data.product.subcategory_name);
                $('#pbrand').text(data.product.brand_name);
                $('#pcode').text(data.product.product_code);
                $('#product_id').val(data.product.id);

                var d = $('select[name="size"]').empty();
                $.each(data.size, function(key, value){
                    $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.size == "") {
                        $('#sizediv').hide();   
                    }
                    else{
                        $('#sizediv').show();
                    } 
                 });

                var d =$('select[name="color"]').empty();
                $.each(data.color, function(key, value){
                    $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.color == "") {
                        $('#colordiv').hide();
                    }
                    else{
                        $('#colordiv').show();
                    }
                });
            }

        })
        
    }
</script>

{{-- <script type="text/javascript">
    $(document).ready(function() {
          $('.addcart').on('click', function(){  
            var id = $(this).data('id');
            if(id) {
               $.ajax({
                   url: "{{  url('/addtocart/') }}/"+id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    if($.isEmptyObject(data.error)){
                    Toast.fire({
                    type: 'success',
                    title: data.success
                    })
                    }else{
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
</script> --}}
@endsection
