@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Blogs</span>
        <span class="breadcrumb-item active">Add Blog</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Add</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">New Post Add <a href="{{ route('all.blog_post') }}" class="btn btn-success btn-sm pull-right">All Post</a></h6>

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

                <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_en" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_bn" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                        name="post_category_id" required>
                                        <option label="Choose Category" disabled selected>--Choose Category--</option>
                                        @foreach($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details (English) <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote1" name="details_en" required>

                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details (Bangla) <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote2" name="details_bn" required>

                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 mt-2">
                                <label>Post Image<span class="tx-danger">*</span></label>
                                <label class="custom-file ml-2">
                                    <input type="file" id="file" class="custom-file-input ml-5" name="post_image"
                                        onchange="readURL1(this);" accept="image/*" required>
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <img id="one">
                            </div>
                        </div><!-- row -->
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- card -->
    </div><!-- sl-pagebody -->

    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->

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



@endsection
