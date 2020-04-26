@extends ('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Update password</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
				@include('layouts.frontLayout.front_sidebar')
			</div>
            <div class="col-lg-6 order-1 order-lg-2" style="margin-left:150px; !important">
                <form d="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="post" class="checkout-form"> {{ csrf_field() }}
                    <h4>Update password</h4>
                    <div class="row">
                        <div class="col-lg-9">
                            <label for="current_pwd">Current password<span>*</span></label>
                            <input id="current_pwd" name="current_pwd" type="password" placeholder="Current password"/>
                            <span id="chkPwd"></span>
                        </div>
                        <div class="col-lg-9">
                            <label for="new_pwd">New password<span>*</span></label>
                            <input id="new_pwd" name="new_pwd" type="password" placeholder="New password"/>
                        </div>
                        <div class="col-lg-9">
                            <label for="confirm_pwd">Confirm password<span>*</span></label>
                            <input id="confirm_pwd" name="confirm_pwd" type="password" placeholder="Confirm password"/>
                        </div>
                        <div class="order-btn" style="margin:15px 0px 0px 15px;">
                            <button type="submit" class="site-btn place-btn" >Update password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection