@extends ('layouts.frontLayout.front_design')
@section('content')

 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Password recovery</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->
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
<!-- Register Section Begin -->
<div class="register-login-section spad" style="margin-bottom:80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Password recovery</h2>
                    <form id="forgotPasswordForm" name="forgotPasswordForm" action="{{ url('/forgot-password') }}" method="post">{{csrf_field()}}
                        <div class="group-input">
                            <label for="email">Email address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <button type="submit" class="site-btn login-btn">Recover your password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->



@endsection