@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <a class="breadcrumb-item" href="{{ route('brands') }}">Brand List</a>
        <span class="breadcrumb-item active">Brand Update</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Update Brand</h6>

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
                <form method="POST" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="brand_name" value="{{ $brand->brand_name }}" placeholder="Enter Barnd Name..." required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="brand_logo" onchange="readURL1(this);">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-5 col-sm-5 mt-2 ml-4 ">
                                    <label for="exampleInputEmail1">Old Logo : </label>
                                    <img src="{{ URL::to($brand->brand_logo) }}" style="hight:70px; width:70px;">
                                    <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                                </div>
                                <div class="col-lg-5 col-sm-5 mt-2 ml-4" style="visibility: hidden;" id="new_image">
                                    <label for="exampleInputEmail1">New Logo : </label>
                                    <img id="one">
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    </div>
                </form>
            </div><!-- table-wrapper -->
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
                    .width(70)
                    .height(70);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
