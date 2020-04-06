@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>

                                @if ($errors->has('oldpass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">

<div class="contact_form pt-5">
    <div class="container ">
        <div class="row ml-5">
            <div class="col-lg-8 " style="border: 1px solid grey; padding: 20px">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center" style="font-size:22px;">Change Password</div>

                    <form action="{{ route('password.update') }}" method="post" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:15px;">Old Password</label>
                            <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus style="height:38px">

                            @if ($errors->has('oldpass'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('oldpass') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:15px;">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="height:38px">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:15px;">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required style="height:38px">
                        </div>

                        <div class="contact_form_button text-center">
                            <button type="submit" class="button contact_submit_button bg-info">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card mt-4" style="width: 18rem;">
                    <div class="contact_form_container">
                        <img src="{{ asset('public/avatar.jpg') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                            <li class="list-group-item"><a href="{{ route('password.change') }}"> Edit Profile </a></li>
                            <li class="list-group-item"><a href="#"> Return Order </a></li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="panel"></div>
</div>

@endsection
