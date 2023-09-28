@extends('layouts.auth')

@section('content')
    <div class="box">
        <div class="container">
            <div class="img">
                <img src="{{ asset('assets/login/img/baloon.png') }}">
            </div>
            <div class="col-md-12">
                <div class="mb-5" style="text-align: right; ">
                    <img src="{{ asset('assets/login/img/logo.png') }}" width="150">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>Login Form</h3>

                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="social-auth-links text-center my-3">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
