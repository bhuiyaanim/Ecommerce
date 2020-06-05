@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Category</span>
        <span class="breadcrumb-item active">Sub-Category List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Sub-Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Sub-Category List
                <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">Sub-Category Name</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sub_category as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->subcategory_name }}</td>
                            <td>{{ $row->category->category_name }}</td>
                            <td>
                                <a href="{{ route('edit.sub_category', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.sub_category', $row->id) }}" class="btn btn-sm btn-danger"
                                    id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
    
    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->

<!-- Modal -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
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
            <form method="POST" action="{{ route('store.sub_category') }}">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub-Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="subcategory_name" placeholder="Add New Sub-Category.." required>
                        <small id="emailHelp" class="form-text text-muted">You Can Add New Sub-Categories</small>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-12">Category</label>
                        <select class="from-control container ml-3 mr-3" name="category_id" style="border: 1px solid rgba(0, 0, 0, 0.15); padding: 0.65rem 0.75rem; color: #6e7377;">
                            <option disabled selected>--Select Category--</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
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
