@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








@extends ('layouts.frontLayout.front_design')
@section('content')

<!--form-->
<section id="form" style="margin-top:20px;">
    <div class="container">
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_success') !!}</strong>
                </div>
            @endif
            <div class="col-sm-4 col-sm-offset-1">
                <!--login form-->
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <form id="loginForm" name="loginForm" action="{{ url('/user-login') }}" method="post">{{ csrf_field() }}
                        <input id="email" name="email" type="email" placeholder="Indirizzo email" />
                        <input id="password" name="password" type="password" placeholder="Password" />
                        <!-- <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span> -->
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <!--sign up form-->
                <div class="signup-form">
                    <h2>New User Signup!</h2>
                    <form id="registerForm" name="registerForm" action="{{ url('/user-register') }}" method="post">
                        {{ csrf_field() }}
                        <input id="name" name="name" type="text" placeholder="Nome"/>
                        <input id="surname" name="surname" type="text" placeholder="Cognome"/>
                        <input id="username" name="username" type="text" placeholder="Username"/>
                        <input id="email" name="email" type="email" placeholder="Indirizzo email"/>
                        <input id="myPassword" name="password" type="password" placeholder="Password"/>
                        <input id="confirmPassword" name="confirm_password" type="password" placeholder="Ripeti password"/>

                        <button type="submit" class="btn btn-default">Registrati</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
	

@endsection