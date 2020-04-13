@extends ('layouts.frontLayout.front_design')
@section('content')

<!--form-->
<section id="form" style="margin-top:20px;">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <form method="post" action="{{ url('/checkout') }}"> {{ csrf_field() }}
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0; margin-right:15px; margin-left:15px;">
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
           
            <input value="{{ $bill_address->user_name }}" id="billing_name" name="billing_name" class="form-control" type="hidden" /> 
            <input value="{{ $bill_address->user_surname }}" id="billing_surname" name="billing_surname" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->country }}" id="billing_country" name="billing_country" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->province }}" id="billing_province" name="billing_province" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->city }}" id="billing_city" name="billing_city" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->address }}" id="billing_address" name="billing_address" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->pincode }}" id="billing_pincode" name="billing_pincode" class="form-control" type="hidden"/>
            <input value="{{ $bill_address->mobile }}" id="billing_mobile" name="billing_mobile" class="form-control" type="hidden"/>
           
            <div class="col-sm-4">    
                <div class="signup-form">
                    <h2>Shipping address</h2>
                        {{ csrf_field() }}
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_name" name="shipping_name"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->user_name}}" <?php } ?>  class="form-control" type="text" placeholder="Name" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_surname" name="shipping_surname"   <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->user_surname}}" <?php } ?> class="form-control" type="text" placeholder="Surname" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <select id="shipping_country" name="shipping_country"  <?php if($shippingCount > 0) { ?>value="{{ $shippingDetails->country}}" <?php } ?>  class="form-control" required>
                                @foreach($countries as $country)
                                <option value="{{ $country->country_name }}"  <?php if(($shippingCount > 0)) { if($country->country_name == $shippingDetails->country) { ?> selected <?php } } ?> >{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_province" name="shipping_province"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->province}}" <?php } ?> class="form-control" type="text" placeholder="Province" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_city" name="shipping_city"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->city}}" <?php } ?> class="form-control" type="text" placeholder="City" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_address" name="shipping_address"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->address}}" <?php } ?> class="form-control" type="text" placeholder="Address" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_pincode" name="shipping_pincode"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->pincode}}" <?php } ?>  class="form-control" type="text" placeholder="Pin code" required/>
                        </div>
                        <div class="form_group" style="margin-bottom:17px;">
                            <input id="shipping_mobile" name="shipping_mobile"  <?php if($shippingCount > 0) { ?> value="{{ $shippingDetails->mobile}}" <?php } ?>  class="form-control" type="text" placeholder="Mobile" required/>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="copyAddress" name="copyAddress"> 
                            <label class="form-check-label" for="copyAddress">Use billing address</label>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Checkout</button>
                    
                </div>
               
            </div>
        </div>
        </form>
    </div>
</section>
	

@endsection