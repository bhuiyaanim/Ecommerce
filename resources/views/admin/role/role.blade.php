@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">User Role</span>
        <span class="breadcrumb-item active">User List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>User Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">User List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Access</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if($row->category == 1)
                                    <span class="badge badge-danger">Category</span>
                                @else
                                @endif

                                @if($row->coupon == 1)
                                    <span class="badge badge-success">Coupon</span>
                                @else
                                @endif 

                                @if($row->product == 1)
                                    <span class="badge badge-info">Product</span>
                                @else
                                @endif 

                                @if($row->blog == 1)
                                    <span class="badge badge-warning">Blog</span>
                                @else
                                @endif 

                                @if($row->order == 1)
                                    <span class="badge badge-primary">Orders</span>
                                @else
                                @endif

                                @if($row->other == 1)
                                    <span class="badge badge-danger">Other</span>
                                @else
                                @endif

                                @if($row->return == 1)
                                    <span class="badge badge-warning">Return</span>
                                @else
                                @endif

                                @if($row->stock == 1)
                                    <span class="badge badge-success">Stock</span>
                                @else
                                @endif

                                @if($row->report == 1)
                                    <span class="badge badge-info">Report</span>
                                @else
                                @endif
                                
                                @if($row->contact == 1)
                                    <span class="badge badge-primary">Contact</span>
                                @else
                                @endif

                                @if($row->setting == 1)
                                    <span class="badge badge-danger">Setting</span>
                                @else
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.user', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.user', $row->id) }}" class="btn btn-sm btn-danger"
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

@endsection
