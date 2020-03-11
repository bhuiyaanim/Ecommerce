@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Starlight</a>
        <a class="breadcrumb-item" href="{{ route('categories') }}">Category List</a>
        <span class="breadcrumb-item active">Category Update</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Category Update</h6>

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
                <form method="POST" action="{{ route('update.category', $category->id) }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="category_name" value="{{ $category->category_name }}">
                        </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    </div>
                </form>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div>


@endsection
