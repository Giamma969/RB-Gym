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

<section id="do_action">
    <div class="container">
        <div class="heading" align="center" >
            <h3>YOUR ORDER HAS BEEN PLACED</h3>
            <p>Your order number is {{ Session::get('order_id') }} and total payble about is € {{ Session::get('grand_total') }}</p>
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