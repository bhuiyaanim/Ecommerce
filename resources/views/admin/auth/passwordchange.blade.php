@extends('admin.admin_layouts')
@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Password Change</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Password Change</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title mb-4">Admin Password Change</h6>

            <div class="table-wrapper">
                <form method="POST" action="{{ Route('admin.password.update') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="oldpass"
                            class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                        <div class="col-md-6">
                            <input id="oldpass" type="password"
                                class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}"
                                name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required
                                autofocus>

                            @if ($errors->has('oldpass'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('oldpass') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0 row justify-content-center">
                        <div class="col-md-6 offset-md-4">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->

    @section('admin_footer')
    @endsection

</div><!-- sl-mainpanel -->


@endsection
