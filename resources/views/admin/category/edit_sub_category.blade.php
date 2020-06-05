@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <a class="breadcrumb-item" href="{{ route('sub_categories') }}">Sub-Category List</a>
        <span class="breadcrumb-item active">Sub-Category Update</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Sub-Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Update Sub-Category</h6>

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
                <form method="POST" action="{{ route('update.sub_category', $sub_category->id) }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $sub_category->id }}">
                            <label for="exampleInputEmail1">Sub-Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="subcategory_name" value="{{ $sub_category->subcategory_name }}">
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail1" class="col-12">Category</label>
                            <select class="from-control container ml-3 mr-3" name="category_id" style="border: 1px solid rgba(0, 0, 0, 0.15); padding: 0.65rem 0.75rem; color: #393f44;">
                                {{-- <option disabled>--Select Category--</option> --}}
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}" <?php
                                        if ( $row->id == $sub_category->category_id ) {
                                            echo "Selected";
                                        }
                                    ?>>{{ $row->category_name }} </option>
                                @endforeach
                            </select>
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


@endsection
