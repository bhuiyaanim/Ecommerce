@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Products</span>
        <span class="breadcrumb-item active">Add Product</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Add</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">New Product Add <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">All
                Product</a></h6>

            <div class="table-wrapper">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity" value="{{ old('product_quantity') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                        name="category_id" required>
                                        <option label="Choose Category" disabled selected>--Choose Category--</option>
                                        @foreach($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub-Category:</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Sub-Category"
                                        name="sub_category_id">
                                        <option label="Choose Sub-Category" disabled selected>--Choose Sub-Category--
                                        </option>

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand:</label>
                                    <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                                        <option value="0" disabled selected>--Choose Brand--</option>
                                        @foreach($brand as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4 mt-2">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size:</label><br>
                                    <input class="form-control" type="text" name="product_size" id="size"
                                        data-role="tagsinput" value="{{ old('product_size') }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4 mt-2">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                            class="tx-danger">*</span></label><br>
                                    <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput"
                                        id="color" value="{{ old('product_color') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4 mt-2">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Selling Price" value="{{ old('selling_price') }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="product_details" required>
                                        {{ old('product_details') }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link</label>
                                    <input class="form-control" placeholder="Video Link" name="video_link" value="{{ old('video_link') }}">
                                </div>
                            </div>

                            <div class="col-lg-4 mt-2">
                                <label>Image One (Main Thumbnail)<span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_one"
                                        onchange="readURL1(this);" accept="image/*" required>
                                    <span class="custom-file-control"></span>
                                    <img class="mt-2 mb-3" src="#" id="one">
                                </label>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <label>Image Two <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_two"
                                        onchange="readURL2(this);" accept="image/*" required>
                                    <span class="custom-file-control"></span>
                                    <img class="mt-2 mb-3" src="#" id="two">
                                </label>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <label>Image Three <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_three"
                                        onchange="readURL3(this);" accept="image/*" required>
                                    <span class="custom-file-control"></span>
                                    <img class="mt-2 mb-3" src="#" id="three">
                                </label>
                            </div>
                        </div><!-- row -->
                        <hr>
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1">
                                    <span>Trend Product</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Mid Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New</span>
                                </label>
                            </div>

                            {{-- <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1">
                                    <span>Buy One Get One</span>
                                </label>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        </div>
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- card -->

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


<script type="text/javascript">
	$(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/admin/get/sub_category/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="sub_category_id"]').empty();
                        $('select[name="sub_category_id"]').append('<option value="'+ '0' +'">' + "--Choose Sub-Category--" + '</option>');
                        $.each(data, function(key, value){
                            $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
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
                    .width(60)
                    .height(60);
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
                    .width(60)
                    .height(60);
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
                    .width(60)
                    .height(60);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
