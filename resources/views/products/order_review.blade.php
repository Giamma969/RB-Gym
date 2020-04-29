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
                    <a href="">Check Out</a>
                    <span>Order review</span>
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
        <form action="{{ url('/place-order')}}" method="post" class="checkout-form">{{csrf_field()}}
            <div class="row">
                <div class="col-lg-6">
                    <h4>Shipping Details</h4>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="shipping_name">First Name</label>
                            <input id="shipping_name" type="text" value="{{ $shippingDetails->user_name }}" readonly>
                            <!-- <input id="shipping_name" name="shipping_name"  value="{{ $shippingDetails->user_name }}" type="text" required readonly> -->
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_surname">Last name</label>
                            <input id="shipping_surname" type="text" value="{{ $shippingDetails->user_surname }}" readonly>
                            <!-- <label for="shipping_surname">Last Name</label>
                            <input id="shipping_surname" name="shipping_surname" value="{{ $shippingDetails->user_surname}}" type="text" required readonly> -->
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_country">Country</label>
                            <input id="shipping_country" type="text" value="{{ $shippingDetails->country }}" readonly>
                            <!-- <label for="shipping_country">Country</label>
                            <input id="shipping_country" name="shipping_country" value="{{ $shippingDetails->country}}" type="text" required readonly> -->
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="shipping_province">Province</label>
                            <input id="shipping_province" type="text" value="{{ $shippingDetails->province }}" readonly>
                            <!-- <label for="shipping_province">Province</label>
                            <input id="shipping_province" name="shipping_province" value="{{ $shippingDetails->province}}" type="text" required readonly>  -->
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_city">City</label>
                            <input id="shipping_city" type="text" value="{{ $shippingDetails->city }}" readonly>
                            <!-- <label for="shipping_city">City</label></label>
                            <input id="shipping_city" name="shipping_city" value="{{ $shippingDetails->city}}" type="text" required readonly> -->
                        </div>
                        <div class="col-lg-12">
                            <label for="shipping_address">Address</label>
                            <input id="shipping_address" type="text" value="{{ $shippingDetails->address }}" readonly>
                            <!-- <label for="shipping_address">Address</label>
                            <input id="shipping_address" name="shipping_address" value="{{ $shippingDetails->address}}" class="street-first" type="text"  required readonly> -->
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_pincode">Postcode / ZIP</label>
                            <input id="shipping_pincode" type="text" value="{{ $shippingDetails->pincode }}" readonly>
                            <!-- <label for="shipping_pincode">Postcode / ZIP</label> -->
                            <!-- <input id="shipping_pincode" name="shipping_pincode"  value="{{ $shippingDetails->pincode}}" type="text" required readonly> -->
                        </div>
                        <div class="col-lg-6">
                            <label for="shipping_mobile">Phone</label>
                            <input id="shipping_mobile" type="text" value="{{ $shippingDetails->mobile }}" readonly>
                            <!-- <label for="shipping_mobile">Phone</label> -->
                            <!-- <input id="shipping_mobile" name="shipping_mobile" value="{{ $shippingDetails->mobile}}" type="text"  required readonly> -->
                        </div>
                        <div class="proceed-checkout" sty>
                            <a href="{{ url('checkout') }}" class="proceed-btn">Change address</a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                <?php $total_amount=0; ?>
                                @foreach($userCart as $cart)
                                <li class="fw-normal">{{$cart->product_name}} x {{$cart->product_quantity}} <span>€{{$cart->price * $cart->product_quantity}}</span></li>
                                <?php $total_amount = $total_amount +($cart->price * $cart->product_quantity); ?>
                                @endforeach
                                <li class="fw-normal">Subtotal<span>€{{$total_amount}}</span></li>
                                <li class="fw-normal">Shipping cost<span>€0</span></li>
                                <li class="fw-normal">Discount amount<span>
                                    @if($countProduct > 0)
                                        @if (!empty(Session::get('coupon_amount')))
                                            € {{ Session::get('coupon_amount') }}
                                        @else
                                            € 0
                                        @endif
                                    @endif</span>
                                </li>
                                <li class="total-price">Total 
                                    <span>
                                        <?php $grand_total = $total_amount; 
                                            if($total_amount==0 && Session::get('coupon_amount' ) > 0) { ?>
                                                € 0
                                            <?php } else { $grand_total = $total_amount - Session::get('coupon_amount'); ?>
                                                € {{ $grand_total  }} <?php }?>
                                    </span>
                                </li>
                            </ul>
                            <!-- <form  action="{{ url('/place-order')}}" method="post">{{ csrf_field() }} -->
                                <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="Credit-debit-card">
                                            Credit/Debit card
                                            <input type="radio" name="payment_method" id="Credit-debit-card"  value="Credit-debit-card">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="COD">
                                            Cash on delivery
                                            <input type="radio" name="payment_method" id="COD"  value="COD">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" onclick="return selectPaymentMethod();">Place Order</button>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection