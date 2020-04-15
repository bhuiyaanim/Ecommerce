@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<div class="single_product pt-3 pb-5">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset($product->image_one) }}"><img src="{{ asset($product->image_one) }}"
                            alt=""></li>
                    <li data-image="{{ asset($product->image_two) }}"><img src="{{ asset($product->image_two) }}"
                            alt=""></li>
                    <li data-image="{{ asset($product->image_three) }}"><img src="{{ asset($product->image_three) }}"
                            alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset($product->image_one) }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">
                        {{ $product->category->category_name }} > {{ $product->sub_category->subcategory_name }}
                    </div>
                    <div class="product_name">{{ $product->product_name }}</div>
                    <div class="rating_r rating_r_4 product_rating">
                        <i></i><i></i><i></i><i></i><i></i>
                    </div>
                    <div class="product_text mt-4" style="text-align:justify;">
                        <p>{!! $product->product_details_sm !!}</p>
                    </div>
                    <div class="order_info d-flex flex-row mt-4">
                        <form action="{{ route('product.addtocart', $product->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Color</label>
                                        <select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
                                            @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if($product->product_size == NULL)
                                @else
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Size</label>
                                            <select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
                                                @foreach($product_size as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Quantity</label>
                                        <input class="form-control" type="number" pattern="[0-9]*" value="1" name="qty" min="1">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="clearfix" style="z-index: 1000;">
                            </div> --}}
                            <div class="product_price mt-4">Price : Tk 
                                @if($product->discount_price == NULL)
                                    {{ $product->selling_price }}
                                @else
                                    {{ $product->discount_price }}    
                                @endif
                            </div>

                            <div class="button_container mt-4">
                                <button type="submit" class="button cart_button">Add to Cart</button>
                            </div>
                            {{-- <div class="pt-3 ml-3"> --}}
                                <div class="sharethis-inline-share-buttons pt-3 pr-5"></div>
                            {{-- </div> --}}
                        </form>
                    </div>
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
                    <h3 class="viewed_title">Product Details</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Product Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Video or Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Product Review Or Comment box</a>
                        </li>
                    </ul><br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {!! $product->product_details !!}
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            Product Videos : 
                            @if($product->discount_price == NULL)
                                <strong>No Video Available</strong>
                            @else
                                {!! $product->video_link !!}
                            @endif
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0">
</script>
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=5dff5c0e258810001231d9cc&product=inline-share-buttons&cms=sop'
    async='async'></script>

@endsection
