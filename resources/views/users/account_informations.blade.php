@extends ('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Account informations</span>
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
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
				@include('layouts.frontLayout.front_sidebar')
			</div>
            <div class="col-lg-9 order-1 order-lg-2">
                <form id="accountForm" class="checkout-form" name="accountForm" action="{{ url('/account-informations') }}" method="post"> {{ csrf_field() }}
                    <h4>Update account (Billing address)</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name">First Name<span>*</span></label>
                            <input value="{{ $userDetails->name }}" id="name" name="name" type="text" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="surname">Last Name<span>*</span></label>
                            <input  value="{{ $userDetails->surname }}" id="surname" name="surname" type="text" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email<span>*</span></label>
                            <input value="{{ $userDetails->email }}" id="email" name="email" type="email" readonly/>
                        </div>
                        <div class="col-lg-12">
                            <label for="country">Country<span>*</span></label>
                            <select id="country" name="country" class="select_account" required>
                                @foreach($countries as $country)
                                <option value="{{ $country->country_name }}" @if($country->country_name == $bill_address->country) selected @endif >{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="province">Province<span>*</span></label>
                            <input value="{{ $bill_address->province }}" id="province" name="province" type="text" placeholder="Province"/>
                        </div>
                        <div class="col-lg-12">
                            <label for="city">City</label><span>*</span></label>
                            <input value="{{ $bill_address->city }}"id="city" name="city" type="text" placeholder="City"/>
                        </div>
                        <div class="col-lg-12">
                            <label for="address">Address<span>*</span></label>
                            <input value="{{ $bill_address->address }}"id="address" name="address" type="text" placeholder="Address"/>
                        </div>
                        <div class="col-lg-6">
                            <label for="pincode">Postcode / ZIP<span>*</span></label>
                            <input value="{{ $bill_address->pincode }}"id="pincode" name="pincode" type="text" placeholder="Pin code"/>
                        </div>
                        <div class="col-lg-6">
                            <label for="mobile">Phone<span>*</span></label>
                            <input value="{{ $bill_address->mobile }}"id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                        </div>
                        <div class="order-btn" style="margin:15px 0px 0px 15px;">
                            <button type="submit" class="site-btn place-btn">Update account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection