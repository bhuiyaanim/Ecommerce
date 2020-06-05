@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Site Setting</span>
        <span class="breadcrumb-item active">Database Backup</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Database Backup Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Database Backup List
                <a href="{{ route('backup.now') }}" class="btn btn-sm btn-warning" style="float: right">Backup Now</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL.</th>
                            <th class="wd-15p">File Name</th>
                            <th class="wd-15p">Size</th>
                            <th class="wd-15p">Path</th>
                            <th class="wd-15p">Download</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($files as $key => $row)
                        <tr class="odd gradeX">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->getFilename() }}</td>
                            <td>{{ $row->getSize() }} Kb</td>
                            <td>{{ $row->getpath() }}</td>
                            <td class="text-justify">
                                <a href="{{ url($row->getFilename()) }}" class="btn btn-sm btn-primary" title="Download">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="center">
                                <a href="{{ url('admin/database/delete/'.$row->getFilename() ) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
