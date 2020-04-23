@extends ('layouts.frontLayout.front_design')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
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
                        <h2>Register</h2>
                        <form id="registerForm" name="registerForm" action="{{ url('/user-register') }}" method="post">{{csrf_field()}}
                            <div class="group-input">
                                <label for="name">Name *</label>
                                <input id="name" name="name" type="text" required>
                            </div>
                            <div class="group-input">
                                <label for="surname">Surname *</label>
                                <input id="surname" name="surname" type="text" required>
                            </div>    
                            <div class="group-input">
                                <label for="username">Username *</label>
                                <input id="username" name="username" type="text" required>
                            </div>
                            <div class="group-input">
                                <label for="email">Email *</label>
                                <input id="email" name="email" type="email" required>
                            </div>
                            <div class="group-input">
                                <label for="password">Password *</label>
                                <input id="myPassword" name="password" type="password" required>
                            </div>
                            <div class="group-input">
                                <label for="confirm_password">Confirm Password *</label>
                                <input id="confirmPassword" name="confirm_password" type="password" required>
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{url('/user-login')}}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->


@endsection