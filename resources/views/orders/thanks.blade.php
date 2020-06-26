@extends ('layouts.frontLayout.front_design')
@section('content')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Order confirmed</span>
                </div>
            </div>
        </div>
    </div>
</div> 
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
<section id="do_action">
    <div class="container">
        <div class="heading" style="text-align:left; padding:50px 280px 50px 280px;">
            <h3>Your order has been placed. </h3><h3>Thanks for choosing us!</h3>
            <p>Your order number is <b>{{ Session::get('order_id') }}</b> and total payble about is <b>€ {{ Session::get('grand_total') }}</b>.</p>
             
            <p></p> 
            <p>In the section "<a class="a_footer" style="color: #c4c4c4;" href="{{ url('/orders') }}">Your orders</a>" you can check the status of your order at any time.</p>

            <p>For any information do not hesitate to contact us at , we are always at your disposal.</p>

            <p>Cordially RB-Gym Team</p>
            
        </div>
    </div>
</section>

@endsection

<?php 
    Session::forget('grand_total');
    Session::forget('order_id');
    Session::forget('coupon_code');
    Session::forget('coupon_amount');
?>