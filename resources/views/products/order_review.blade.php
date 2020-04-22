@extends ('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Checkout</li>
                <li>  <a href="">Order review</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Confirm shipping address</h2>
                    {{ csrf_field() }}
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->user_name }} 
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->user_surname }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->country }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->province }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->city }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->address }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->pincode }}
                    </div>
                    <div class="form_group" style="margin-bottom:17px;">
                        {{ $shippingDetails->mobile }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cart_items">
		<div class="container">
            <!-- start breadcrums -->
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order review</li>
				</ol>
			</div>
            <!-- end breadcrums-->
			<div class="shopper-informations">
				<div class="row">			
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
                        <?php $total_amount=0; ?>
                        @foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:150px;" src="{{asset('images/backend_images/products/small/'.$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
                            <h4><a href="">{{ $cart->product_name}}</a></h4>
								<p>Code: {{ $cart->product_code}}</p>
							</td>
							<td class="cart_price">
								<p>€ {{ $cart->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                    {{ $cart->product_quantity }}
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">€ {{ $cart->price * $cart->product_quantity }}</p>
							</td>
                        </tr>
                        <?php $total_amount = $total_amount +($cart->price * $cart->product_quantity); ?>
                        
                        @endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>€ {{ $total_amount }}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
                                    </tr>
                                    <tr class="shipping-cost">
										<td>Discount Amount</td>
										<td>@if($countProduct > 0)
                                                @if (!empty(Session::get('coupon_amount')))
                                                    € {{ Session::get('coupon_amount') }}
                                                @else
                                                    € 0
                                                @endif
                                            @endif
                                        </td>										
                                    </tr>
									<tr>
                                        <td>Grand Total</td>
                                        <?php $grand_total = $total_amount; 
                                            if($total_amount==0 && Session::get('coupon_amount' ) > 0) { ?>
                                            <td><span>€ 0</span></td>
                                        <?php } else { $grand_total = $total_amount - Session::get('coupon_amount'); ?>
                                            <td><span>€ {{ $grand_total  }} </span></td><?php }?>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
            </div>
            <form name="paymentForm" id="paymentForm" action="{{ url('/place-order')}}" method="post" >{{ csrf_field() }}
                <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                <div class="payment-options">
                    <span>
                        <label><strong>Select payment method </strong></label>
                    </span>
                    <span>
                        <label><input type="radio" name="payment_method" id="Credit-debit-card" value="Credit-debit-card" checked>Credit/Debit card</label>
                    </span>
                    <span>
                        <label><input type="radio" name="payment_method" id="COD" value="COD">Cash on delivery</label>
                    </span>
                    <span style="float:right;"> 
                        <button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Place order</button>
                    </span>
                </div>
                
            </form>

		</div>
	</section> <!--/#cart_items-->
	

@endsection