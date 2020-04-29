@extends ('layouts.frontLayout.front_design')
@section('content')



 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Shopping Cart</span>
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
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount=0; ?>
                            @foreach($userCart as $product)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <a href="{{ url('product/'.$product->id) }}">
                                            <img src="{{asset('images/backend_images/products/small/'.$product->image)}}" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-title first-row">
                                        <a href="{{ url('product/'.$product->id) }}">
                                            <h5>{{ $product->product_name}}</h5>
                                        </a>
                                        <p>Code: {{ $product->product_code}}</p>
                                    </td>
                                    <td class="p-price first-row">€{{ $product->price }}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            @if($product->product_quantity > 1 ) 
                                                <a href="{{ url('/cart/update-quantity/'.$product->id.'/-1')  }}"><button>-</button></a>
                                            @endif
                                            <input type="text" name="quantity" style="width:30px; text-align:center;" value="{{$product->product_quantity}}" readonly required>
                                            <a href="{{ url('/cart/update-quantity/'.$product->id.'/1')  }}"><button>+</button></a>
                                            
                                        </div>
                                    </td>
                                    <td class="total-price first-row">€{{ $product->price * $product->product_quantity }}</td>
                                    <td class="close-td first-row"><a href="{{ url('/cart/delete-product/'.$product->id) }}" style="color:black;"><i class="ti-close"></i></a></td>                                   
                                </tr>
                                <?php $total_amount = $total_amount+ ($product->price * $product->product_quantity);  ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            @if(Session::has('coupon_code') == false)
                                <form action="{{ url('cart/apply-coupon') }}" method="post" class="coupon-form">{{ csrf_field() }}
                                    <input type="text" name="coupon_code" placeholder="Enter your codes" required>
                                    <button type="submit" class="site-btn coupon-btn">Apply coupon</button>
                                </form>
                            @else
                                <p>Your coupon has been applied</p>
                                <a href="{{ url('cart/forget-coupon') }}">
                                    <input class="site-btn coupon-btn" type="button" value="Forget coupon">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                @if(!empty(Session::get('coupon_amount')))
                                    <li class="subtotal">Subtotal <span>€ @php echo $total_amount; @endphp</span></li>
                                    <li class="subtotal">Discount <span> € {!! session ('coupon_amount') !!} </span></li>
                                    @if($total_amount == 0)
                                        <li class="cart-total">Total <span> € 0</span></li>
                                    @else
                                        <li class="cart-total">Total <span> € @php echo $total_amount - Session::get('coupon_amount'); @endphp </span></li>
                                    @endif
                                        <?php /* <li>Shipping Cost <span>Free</span></li> */ ?>
                                @else
                                    <li class="cart-total">Total <span> € @php echo $total_amount; @endphp </span></li>
                                @endif
                            </ul>
                            <a href="{{ url('checkout') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->


@endsection