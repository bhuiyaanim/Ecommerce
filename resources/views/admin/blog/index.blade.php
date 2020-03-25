@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Blogs</span>
        <span class="breadcrumb-item active">Blog List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Post Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Post List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($post as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->post_title_en }}</td>
                            <td>{{ $row->post_category_id}}</td>
                            {{-- <td>{{ $row->postcategory->category_name_en }}</td> --}}
                            @if($row->post_image)
                                <td><img src="{{ URL::to($row->post_image) }}" height="40px;" width="40px;"></td>
                            @else
                                <td>No Image</td>
                            @endif
                            <td>
                                <a href="{{ route('edit.post', $row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete.post', $row->id) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
                                {{-- <a href="{{ route('view.post', $row->id) }}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-eye"></i></a> --}}
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
