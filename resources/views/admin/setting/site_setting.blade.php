@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Site Setting</span>
        <span class="breadcrumb-item active">Site Setting</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Website Setting</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Setting Update</h6>

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

                <form action="{{ route('update.siteSetting') }}" method="POST">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <input type="hidden" name="id" value="{{ $setting->id }}" required>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone One: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone_one" value="{{ $setting->phone_one }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone_two" value="{{ $setting->phone_two }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ $setting->email }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_name" value="{{ $setting->company_name }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_address" value="{{ $setting->company_address }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="facebook" value="{{ $setting->facebook }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="youtube" value="{{ $setting->youtube }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Instagram Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="instagram" value="{{ $setting->instagram }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="twitter" value="{{ $setting->twitter }}" required>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->

    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->


@endsection
