@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Return</span>
        @if(request()->is('admin/return/request'))
            <span class="breadcrumb-item active">Return Request List</span>
        @elseif(request()->is('admin/all/return'))
            <span class="breadcrumb-item active">All Return List</span>
        @endif
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>{{$title}} Order</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            @if(request()->is('admin/return/request'))
                <h6 class="card-body-title mb-4">Request List</h6>
            @elseif(request()->is('admin/all/return'))
                <h6 class="card-body-title mb-4">Return List</h6>
            @endif
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p text-center">SL.</th>
                            <th class="wd-15p text-center">Payment Type</th>
                            <th class="wd-15p text-center">Transection ID</th>
                            <th class="wd-15p text-center">Subtotal</th>
                            <th class="wd-15p text-center">Shipping</th>
                            <th class="wd-15p text-center">Total</th>
                            <th class="wd-15p text-center">Date</th>
                            <th class="wd-15p text-center">Return</th>
                            <th class="wd-20p text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($order as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->payment_type }}</td>
                            <td>{{ $row->blnc_transection }}</td>
                            <td>{{ $row->subtotal }} Tk</td>
                            <td>{{ $row->shipping }} Tk</td>
                            <td>{{ $row->total }} Tk</td>
                            <td>{{ $row->date }}</td>
                            <td>
                                @if($row->return_order == 1)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($row->return_order == 2) 
                                    <span class="badge badge-success">Success</span>
                                @elseif($row->return_order == 3) 
                                    <span class="badge badge-danger">Canceled</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('view.return', $row->id) }}" class="btn btn-sm btn-info">View</a>
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
