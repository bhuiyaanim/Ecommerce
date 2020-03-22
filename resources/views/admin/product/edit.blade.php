@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h6 class="card-body-title">Update Product</h6>
            <form action="{{ route('update.product.without_photo', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name"
                                    value="{{ $product->product_name }}" required>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code"
                                    value="{{ $product->product_code }}" required>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity"
                                    value="{{ $product->product_quantity }}" required>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price:</label>
                                <input class="form-control" type="text" name="discount_price"
                                    value="{{ $product->discount_price }}">
                            </div>
                        </div><!-- col-6 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Category"
                                    name="category_id" required>
                                    <option label="Choose Category" disabled selected>--Choose Category--</option>
                                    @foreach($category as $category)
                                    <option value="{{ $category->id }}" <?php
                                                if ( $product->category_id == $category->id ) {
                                                    echo "selected";
                                                }
                                            ?>>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub-Category:</label>
                                <select class="form-control select2" data-placeholder="Choose Sub-Category"
                                    name="sub_category_id">
                                    <option label="Choose Sub-Category" disabled selected>--Choose Sub-Category--
                                    </option>
                                    @foreach($sub_category as $sub_category)
                                    <option value="{{ $sub_category->id }}" <?php
                                                if ( $product->sub_category_id == $sub_category->id ) {
                                                    echo "selected";
                                                }
                                            ?>>{{ $sub_category->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand:</label>
                                <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                                    <option value="0" disabled selected>--Choose Brand--</option>
                                    @foreach($brand as $brand)
                                    <option value="{{ $brand->id }}" <?php
                                                if ( $product->brand_id == $brand->id ) {
                                                    echo "selected";
                                                }
                                            ?>>{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Product Size:</label><br>
                                <input class="form-control" type="text" name="product_size" id="size"
                                    data-role="tagsinput" value="{{ $product->product_size }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span
                                        class="tx-danger">*</span></label><br>
                                <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput"
                                    id="color" value="{{ $product->product_color }}" required>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mt-2">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" placeholder="Selling Price"
                                    value="{{ $product->selling_price }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12 mt-1">
                            <div class="form-group">
                                <label class="form-control-label">Product Details <span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="product_details" required>
                                    {{ $product->product_details }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link</label>
                                <input class="form-control" placeholder="Video Link" name="video_link"
                                    value="{{ $product->video_link }}">
                            </div>
                        </div>


                    </div><!-- row -->

                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label>Image One (Main Thumbnail)</label>
                            <div>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_one"
                                        onchange="readURL1(this);" accept="image/*">
                                    <input type="hidden" name="old_image_one" value="{{ $product->image_one }}">
                                    <span class="custom-file-control"></span>

                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img src="{{ URL::to($product->image_one) }}" style="hight:80px; width:80px;">
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img id="one">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label>Image Two</label>
                            <div>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_two"
                                        onchange="readURL2(this);" accept="image/*">
                                    <input type="hidden" name="old_image_two" value="{{ $product->image_two }}">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img src="{{ URL::to($product->image_two) }}" style="hight:80px; width:80px;">
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img id="two">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label>Image Three</label>
                            <div>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_three"
                                        onchange="readURL3(this);" accept="image/*">
                                    <input type="hidden" name="old_image_three" value="{{ $product->image_three }}">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img src="{{ URL::to($product->image_three) }}" style="hight:80px; width:80px;">
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <img id="three">
                        </div>
                    </div>


                    <hr>
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1" <?php if($product->main_slider == 1)
                                            {
                                                echo "checked";
                                            }
                                        ?>>
                                <span>Main Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1" <?php if($product->hot_deal == 1)
                                        {
                                            echo "checked";
                                        }
                                    ?>>
                                <span>Hot Deal</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1" <?php if($product->best_rated == 1)
                                        {
                                            echo "checked";
                                        }
                                    ?>>
                                <span>Best Rated</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1" <?php if($product->trend == 1)
                                        {
                                            echo "checked";
                                        }
                                    ?>>
                                <span>Trend Product</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1" <?php if($product->mid_slider == 1)
                                        {
                                            echo "checked";
                                        }
                                    ?>>
                                <span>Mid Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1" <?php if($product->hot_new == 1)
                                        {
                                            echo "checked";
                                        }
                                    ?>>
                                <span>Hot New</span>
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5" type="submit">Update</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div><!-- card -->
    </div><!-- sl-pagebody -->


    <footer class="sl-footer">
        <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
            <div>Made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
            <a target="_blank" class="pd-x-5"
                href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i
                    class="fa fa-facebook tx-20"></i></a>
            <a target="_blank" class="pd-x-5"
                href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i
                    class="fa fa-twitter tx-20"></i></a>
        </div>
    </footer>
</div><!-- sl-mainpanel -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
    crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/admin/get/sub_category/') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="sub_category_id"]').empty();
                        $('select[name="sub_category_id"]').append('<option value="' + '0' +
                            '">' + "--Choose Sub-Category--" + '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

</script>

<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection
