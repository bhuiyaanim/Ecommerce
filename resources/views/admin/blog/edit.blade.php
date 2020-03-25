@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <a class="breadcrumb-item" href="{{ route('all.blog_post') }}">Blog List</a>
        <span class="breadcrumb-item active">Update Blog</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Update Blog</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Post Update</h6>
            
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

                <form action="{{ route('update.post', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en" value="{{ $post->post_title_en }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_bn" value="{{ $post->post_title_bn }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                        name="post_category_id" required>
                                        <option label="Choose Category" disabled selected>--Choose Category--</option>
                                        @foreach($category as $category)
                                            <option value="{{ $category->id }}" <?php
                                                if ( $post->post_category_id == $category->id ) {
                                                    echo "selected";
                                                }
                                            ?> >{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details (English) <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote1" name="details_en" required>
                                        {{ $post->details_en }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-1">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details (Bangla) <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote2" name="details_bn" required>
                                        {{ $post->details_bn }}
                                    </textarea>
                                </div>
                            </div>
                                
                            <div class="col-lg-6 col-sm-6 mt-2">
                                <label>Post Image</label>
                                <div>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="post_image"
                                            onchange="readURL1(this);" accept="image/*">
                                        <input type="hidden" name="old_post_image" value="{{ $post->post_image }}">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 mt-2">
                                <label for="exampleInputEmail1">Old Image : </label>
                                <img src="{{ URL::to($post->post_image) }}" style="hight:80px; width:80px;">
                            </div>
                            <div class="col-lg-3 col-sm-3 mt-2" style="visibility: hidden;" id="new_image">
                                <label for="exampleInputEmail1">New Image : </label>
                                <img id="one">
                            </div>




                        </div><!-- row -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
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
        document.getElementById('new_image').style.visibility = "visible";
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



@endsection
