@extends ('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items" style="margin-top:20px;">
	<div class="container">
		<div>
			<ol class="breadcrumb">
				<li><a style="color:#333 !important;" href="/">Home</a></li>
				<li><a style="color:#333 !important;" href="cart">Shopping Cart</a></li>
			</ol>
			@if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" style="">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_success') !!}</strong>
                </div>
            @endif
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
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount=0; ?>
					@foreach($userCart as $product)    
						<tr>
						<td class="cart_product">
							<a href=""><img style="width:65px;" src="{{asset('images/backend_images/products/small/'.$product->image)}}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $product->product_name}}</a></h4>
							<p>Code: {{ $product->product_code}}</p>
						</td>
						<td class="cart_price">
							<p>€ {{ $product->price }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$product->id.'/1')  }}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $product->product_quantity }}" autocomplete="off" size="2" readonly required>
								@if($product->product_quantity > 1 ) 
									<a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$product->id.'/-1')  }}"> - </a>
								@endif
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">€ {{ $product->price * $product->product_quantity }}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$product->id) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php $total_amount = $total_amount+ ($product->price * $product->product_quantity);  ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a coupon code you want to use.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								@if(Session::has('coupon_code') == false)
								<form action="{{ url('cart/apply-coupon') }}" method="post"> {{ csrf_field() }}
									<label>Coupon Code</label>
									<input type="text" name="coupon_code" required>
									<input type="submit" value="Apply coupon" class="btn btn-default">
								</form>
								@else
									<p>Your coupon has been applied</p>
									<a href="{{ url('cart/forget-coupon') }}">
										<input class="btn btn-default" type="button" value="Forget coupon">
									</a>
								@endif
							</li>
							
							
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if(!empty(Session::get('coupon_amount')))
								<li>Subtotal <span>€ @php echo $total_amount; @endphp</span></li>
								<li>Discount <span> € {!! session ('coupon_amount') !!} </span></li>
								@if($total_amount == 0)
									<li>Total <span> € 0</span></li>
								@else
									<li>Total <span> € @php echo $total_amount - Session::get('coupon_amount'); @endphp </span></li>
								@endif
									<?php /* <li>Shipping Cost <span>Free</span></li> */ ?>
							@else
								<li>Total <span> € @php echo $total_amount; @endphp </span></li>
							@endif
							</ul>
							
							<a class="btn btn-default check_out" href="{{ url('checkout') }}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection