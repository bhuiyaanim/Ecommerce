@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display&display=swap" rel="stylesheet"> 

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <a class="breadcrumb-item" href="{{ route('all.product') }}">All Order</a>
        <span class="breadcrumb-item active">Order Details</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Order Details</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Order Details</h6>
            <div class="table-wrapper">
                <div class="form-layout" >
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name:</label>
                                <input class="form-control" value="{{ $product->product_name }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code:</label>
                                <input class="form-control" value="{{ $product->product_code }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity:</label>
                                <input class="form-control" value="{{ $product->product_quantity }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category:</label>
                                <input class="form-control" value="{{ $product->category->category_name }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub-Category:</label>
                                <input class="form-control" value="{{ $product->sub_category->subcategory_name }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand:</label>
                                <input class="form-control" value="{{ $product->brand->brand_name }}" readonly>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Product Size:</label><br>
                                <input class="form-control" value="{{ $product->product_size }}" readonly>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Product Color:</label><br>
                                <input class="form-control" value="{{ $product->product_color }}" readonly>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price:</label>
                                <input class="form-control" value="{{ $product->selling_price }}" readonly>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12 mt-1">
                            <div class="form-group" style="text-align:justify; color:#3f454a; border:1px solid grey; padding:10px;">
                                <label class="form-control-label">Product Details:</label>
                                <p>{!! $product->product_details !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-1">
                            <div class="form-group" style="text-align:justify; color:#3f454a; border:1px solid grey; padding:10px;">
                                <label class="form-control-label">Product Short Description:</label>
                                <p>{!! $product->product_details_sm !!}</p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link</label>
                                <input class="form-control" value="{{ $product->video_link }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Image One (Main Thumbnail) : </label>
                            <img class="ml-2" src="{{ URL::to($product->image_one) }}" style="hight:80px; width:80px;">
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Image Two : </label>
                            <img class="ml-2" src="{{ URL::to($product->image_two) }}" style="hight:80px; width:80px;">
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Image Three : </label>
                            <img class="ml-2" src="{{ URL::to($product->image_three) }}" style="hight:80px; width:80px;">
                            </label>
                        </div>
                    </div><!-- row -->
                    <hr>
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->main_slider == 1)
                                    <input type="checkbox" name="main_slider" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="main_slider" onclick="return false;">
                                @endif
                                <span>Main Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->hot_deal == 1)
                                    <input type="checkbox" name="hot_deal" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="hot_deal" onclick="return false;">
                                @endif
                                <span>Hot Deal</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->best_rated == 1)
                                    <input type="checkbox" name="best_rated" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="best_rated" onclick="return false;">
                                @endif
                                <span>Best Rated</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->trend == 1)
                                    <input type="checkbox" name="trend" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="trend" onclick="return false;">
                                @endif
                                <span>Trend Product</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->mid_slider == 1)
                                    <input type="checkbox" name="mid_slider" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="mid_slider" onclick="return false;">
                                @endif
                                <span>Mid Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->hot_new == 1)
                                    <input type="checkbox" name="hot_new" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="hot_new"  onclick="return false;">
                                @endif
                                <span>Hot New</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                @if($product->buy_one_get_one == 1)
                                    <input type="checkbox" name="buyone_getone" checked onclick="return false;">
                                @else
                                    <input type="checkbox" name="buyone_getone"  onclick="return false;">
                                @endif
                                <span>Buy One Get One</span>
                            </label>
                        </div>
                    </div>


                    {{-- <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="buyone_getone" value="1">
                            <span>Buy One Get One</span>
                        </label>
                    </div> --}}

                </div><!-- card -->
            </div>
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
