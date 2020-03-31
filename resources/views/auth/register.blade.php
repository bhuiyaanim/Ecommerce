@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">

<div class="contact_form pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2" style="border: 1px solid grey; padding: 20px">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Sign Up</div>

                    <form action="{{ route('register') }}" id="contact_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:17px;">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter Full Name" required style="height:40px">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <span class="icon_soon_botton_right"><i class="fas fa-unlock"></i></span> --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:17px;">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" aria-describedby="emailHelp" name="phone"
                                value="{{ old('phone') }}"  placeholder="Enter Phone Number ex:(01********1)" required style="height:40px">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:17px;">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter Email" required style="height:40px">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:17px;">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Enter Password" required style="height:40px">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:17px;">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" autofocus placeholder="Re-type Password" required style="height:40px">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="contact_form_button text-center">
                            <button type="submit" class="button contact_submit_button bg-success">SignUp</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection