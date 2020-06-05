@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Stock</span>
        <span class="breadcrumb-item active">Product List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Stock Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Product List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($product as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->product_code }}</td>
                            <td>{{ $row->product_name }}</td>
                            <td><img src="{{ URL::to($row->image_one) }}" height="40px;" width="40px;"></td>
                            <td>{{ $row->category->category_name }}</td>
                            <td>
                                <form action="{{ route('update.stock') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $row->id }}">
                                    <input type="number" name="quantity" value="{{ $row->product_quantity }}" pattern="[0-9]*" min="1" style="width:60px; height:24px;" required >
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></button>
                                </form>
                            </td>
                            <td>
                                @if($row->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
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
