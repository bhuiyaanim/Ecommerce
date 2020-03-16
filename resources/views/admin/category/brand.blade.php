@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Category</span>
        <span class="breadcrumb-item active">Brand List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Brand List
                <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Brand Logo</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brand as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->brand_name }}</td>
                            <td><img src="{{ URL::to($row->brand_logo) }}" height="60px;" width="80px;"></td>
                            <td>
                                <a href="{{ route('edit.brand', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.brand', $row->id) }}" class="btn btn-sm btn-danger"
                                    id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div>

<!-- Modal -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="brand_name" placeholder="Add New Brand.." required>
                        <small id="emailHelp" class="form-text text-muted">You Can Add New Brands</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Logo</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="brand_logo" placeholder="Add New Brand Logo.." accept="image/*" required>
                        <small id="emailHelp" class="form-text text-muted">You Can Add New Brand Logo</small>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>

@endsection
