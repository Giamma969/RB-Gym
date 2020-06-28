@extends ('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
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
<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form method="post" action="{{ url('/checkout') }}" class="checkout-form">{{csrf_field()}}
            <input value="{{ $bill_address->user_name }}" id="billing_name" name="billing_name" class="form-control" type="hidden" /> 
            <input value="{{ $bill_address->user_surname }}" id="billing_surname" name="billing_surname" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->country }}" id="billing_country" name="billing_country" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->province }}" id="billing_province" name="billing_province" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->city }}" id="billing_city" name="billing_city" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->address }}" id="billing_address" name="billing_address" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->pincode }}" id="billing_pincode" name="billing_pincode" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->mobile }}" id="billing_mobile" name="billing_mobile" class="form-control" type="hidden"/>
            <div class="row">
                <div class="col-lg-5" style="margin-left:28%;">
                    <!-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> -->
                    <h4>Shipping Details</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="shipping_name">First Name<span>*</span></label>
                            <input id="shipping_name" name="shipping_name"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->user_name}}" <?php } ?> type="text" placeholder="Name" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_surname">Last Name<span>*</span></label>
                            <input id="shipping_surname" name="shipping_surname"   <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->user_surname}}" <?php } ?> type="text" placeholder="Surname" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_country">Country<span>*</span></label>
                            <select id="shipping_country" name="shipping_country"  <?php if($shippingCount > 0) { ?>value="{{ $shippingDetails->country}}" <?php } ?> required>
                                @foreach($countries as $country)
                                <option value="{{ $country->country_name }}"  <?php if(($shippingCount > 0)) { if($country->country_name == $shippingDetails->country) { ?> selected <?php } } ?> >{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="shipping_province">Province<span>*</span></label>
                            <input id="shipping_province" name="shipping_province"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->province}}" <?php } ?> type="text" placeholder="Province" required> 
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_city">City</label><span>*</span></label>
                            <input id="shipping_city" name="shipping_city"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->city}}" <?php } ?> type="text" placeholder="City" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_address">Address<span>*</span></label>
                            <input id="shipping_address" name="shipping_address"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->address}}" <?php } ?> class="street-first" type="text" placeholder="Address" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_pincode">Postcode / ZIP<span>*</span></label>
                            <input id="shipping_pincode" name="shipping_pincode"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->pincode}}" <?php } ?>  type="text" placeholder="Pin code" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_mobile">Phone<span>*</span></label>
                            <input id="shipping_mobile" name="shipping_mobile"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->mobile}}" <?php } ?>  type="text" placeholder="Mobile" required>
                        </div>
                        <div class="col-lg-12">
                            <div class="create-item">
                                <label for="copyAddress">
                                    Use billing address?
                                    <input type="checkbox"  id="copyAddress" name="copyAddress">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="order-btn" style="margin-top:15px; margin-left:15px;">
                            <button type="submit" class="site-btn place-btn">Order review</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection