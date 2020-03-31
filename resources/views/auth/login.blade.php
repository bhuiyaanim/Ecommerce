@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">

<div class="contact_form pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2" style="border: 1px solid grey; padding: 20px">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Sign In</div>

                    <form action="{{ route('login') }}" id="contact_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:18px;">Email /  Phone</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Enter Email Or Phone" required style="height:45px">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:18px;">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" aria-describedby="emailHelp" placeholder="Enter Password" required style="height:45px">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="contact_form_button text-center">
                            <button type="submit" class="button contact_submit_button bg-success">Login</button>
                        </div>
                        <div class="contact_form_button text-center pt-3">
                            <a href="{{ route('password.request') }}">Forgot Password ?</a>
                        </div>
                    </form>

                    <div class="row pt-4 pb-4">
                        
                        <div class="col-lg-10 offset-lg-1">
                            {{-- <a href="{{ route('password.request') }}">Forgot Password ?</a> --}}
                            <h3 class="text-center mt-1" style="color:grey;">or</h3>
                            <button type="submit" class="button contact_submit_button bg-primary btn-block">Continue With FaceBook</button>
                            <button type="submit" class="button contact_submit_button bg-danger btn-block">Continue With Google</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection
