@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">User Role</span>
        <span class="breadcrumb-item active">Add User</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>User Add</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">New User Add</h6>

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

                <form action="{{ route('store.user') }}" method="POST">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" value="{{ old('password') }}" required>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <hr>
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="category" value="1">
                                    <span>Category</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="coupon" value="1">
                                    <span>Coupon</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="blog" value="1">
                                    <span>Blog</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="product" value="1">
                                    <span>Product</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="order" value="1">
                                    <span>Order</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="return" value="1">
                                    <span>Return</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="stock" value="1">
                                    <span>Stock</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="report" value="1">
                                    <span>Report</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="contact" value="1">
                                    <span>Contact</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="setting" value="1">
                                    <span>Setting</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="other" value="1">
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
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
