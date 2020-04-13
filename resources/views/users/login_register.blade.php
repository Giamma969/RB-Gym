@extends ('layouts.frontLayout.front_design')
@section('content')

<!--form-->
<section id="form" style="margin-top:20px;">
    <div class="container">
        <div>
            <ol class="breadcrumb">
                <li><a style="color:#333 !important;" href="/">Home</a></li>
                <li><a style="color:#333 !important;" href="login-register">Login-Register</a></li>
            </ol>
        </div>
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0;  margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" style="margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_success') !!}</strong>
                </div>
            @endif
            <div class="col-sm-4 col-sm-offset-1">
                <!--login form-->
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <form id="loginForm" name="loginForm" action="{{ url('/user-login') }}" method="post">{{ csrf_field() }}
                        <input id="email" name="email" type="email" placeholder="Email address" required/>
                        <input id="password" name="password" type="password" placeholder="Password" required/>
                        <!-- <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span> -->
                        <button type="submit" class="btn btn-default">Login</button>
                        <a href="{{ url('forgot-password') }}">Forgot password?</a>
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
                        <input id="name" name="name" type="text" placeholder="Name" required/>
                        <input id="surname" name="surname" type="text" placeholder="Surname" required/>
                        <input id="username" name="username" type="text" placeholder="Username" required/>
                        <input id="email" name="email" type="email" placeholder="Email address" required/>
                        <input id="myPassword" name="password" type="password" placeholder="Password" required/>
                        <input id="confirmPassword" name="confirm_password" type="password" placeholder="Repeat password" required/>

                        <button type="submit" class="btn btn-default">Register</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
	

@endsection