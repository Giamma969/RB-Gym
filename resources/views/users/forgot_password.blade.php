@extends ('layouts.frontLayout.front_design')
@section('content')

<!--form-->
<section id="form" style="margin-top:20px;">
    <div class="container">
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0; margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" styel="margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_success') !!}</strong>
                </div>
            @endif
            <div class="col-sm-4 col-sm-offset-1">
                <!--login form-->
                <div class="login-form">
                    <h2>Forgot password?</h2>
                    <form id="forgotPasswordForm" name="forgotPasswordForm" action="{{ url('/forgot-password') }}" method="post">{{ csrf_field() }}
                        <input id="email" name="email" type="email" placeholder="Email address" required />
                        <button type="submit" class="btn btn-default">Password recovery</button>
                       
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
                        <input id="name" name="name" type="text" placeholder="Name"/>
                        <input id="surname" name="surname" type="text" placeholder="Surname"/>
                        <input id="username" name="username" type="text" placeholder="Username"/>
                        <input id="email" name="email" type="email" placeholder="Email address"/>
                        <input id="myPassword" name="password" type="password" placeholder="Password"/>
                        <input id="confirmPassword" name="confirm_password" type="password" placeholder="Repeat password"/>

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