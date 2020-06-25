<?php
	use App\Http\Controllers\Controller;
	use App\Product;
	$mainCategories= Controller::mainCategories();
	Product::createCartIfNotExists();
	Product::createWishlistIfNotExists();
	$cartCount = Product::cartCount();
	$wishedProducts = Product::countWishedProducts();
?>
	<!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        info@rb-gym.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +39 08624311
                    </div>
                </div>
                <div class="ht-right">
					@if(empty(Auth::check()))
						<a href="{{ url('/user-register') }}" class="login-panel" style="margin-left:20px !important;">Register</a>
						<a href="{{ url('/user-login') }}" class="login-panel"><i class="fa fa-lock"></i> Login</a>
					@else
                        <a href="{{ url('/user-logout') }}" class="login-panel" style="margin-left:20px !important;"><i class="fa fa-sign-out "></i> Logout</a>
                        <a href="{{ url('/account-informations') }}" class="login-panel"><i class="fa fa-user"></i> Account</a>
					@endif
                    <!-- <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a> -->
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{asset('images/frontend_images/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a>
                        <a href="https://twitter.com/" target="_blank"><i class="ti-twitter-alt"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2" style="margin: -20px 0 0 -60px;">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('images/frontend_images/logo1.png')}}" alt="">
                            </a>
                        </div>
					</div>
					<div class="col-lg-7 col-md-7" style="margin-left:80px;">
						<form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }}
							<div  class="advanced-search" >
                                <div class="input-group" style="float:left;">
                                    <input type="text" name="pattern" placeholder="What do you need?">
                                </div>
                                    <div style="float:right">
                                    <button type="submit" class="button_search_listing"><i class="ti-search"></i></button>
                                </div>
							</div>
						</form>
					</div>
                    <div class="col-lg-3 text-right col-md-3" style="margin-left:-50px;">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="{{url('/wishlist')}}">
                                    <i class="icon_heart_alt"></i>
                                    <span>{{$wishedProducts}}</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="{{url('/cart')}}">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{$cartCount}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php $total_amount=0; ?>
                                                @foreach($userCart as $pro)
                                                <tr>
                                                    <td class="si-pic">
                                                        <a href="{{ url('product/'.$pro->id) }}">
                                                            <img style="width:70px;"src="{{asset('images/backend_images/products/small/'.$pro->image)}}" alt="">
                                                        </a>
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                        @if($pro->in_sale == 1)
                                                            <p>{{$pro->new_price}} x {{$pro->product_quantity}}</p>
                                                        @else
                                                            <p>{{$pro->price}} x {{$pro->product_quantity}}</p>
                                                        @endif
                                                            <h6><a href="{{ url('product/'.$pro->id) }}">{{$pro->product_name}}</a></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <a href="{{ url('/cart/delete-product/'.$pro->id) }}" style="color:black;"><i class="ti-close"></i></a>
                                                    </td>
                                                </tr>
                                                @if($pro->in_sale == 1)
                                                    <?php $total_amount = $total_amount+ ($pro->new_price * $pro->product_quantity);  ?>
                                                @else
                                                    <?php $total_amount = $total_amount+ ($pro->price * $pro->product_quantity);  ?>
                                                @endif
                                                
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                    @if(!empty(Session::get('coupon_amount')))
                                        <span>Subtotal:</span><h5>€ @php echo $total_amount; @endphp</h5><br>
                                        <span>Discount:</span><h5>€ {!! session ('coupon_amount') !!}</h5><br>
                                        @if($total_amount == 0)
                                            <span>Total:</span><h5>€ 0</h5><br>
                                        @else
                                            <span>Total:</span><h5>€ @php echo $total_amount - Session::get('coupon_amount'); @endphp</h5><br>
                                        @endif
                                        <?php /* <li>Shipping Cost <span>Free</span></li> */ ?>
                                    @else
                                        <span>Total:</span><h5>€ @php echo $total_amount; @endphp</h5>
                                    @endif
                                    </div>
                                    
                                    <div class="select-button">
                                        <a href="{{ url('/cart') }}" class="primary-btn view-card">VIEW CART</a>
                                        <a href="{{ url('/checkout') }}" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            @if(!empty(Session::get('coupon_amount')))
                                <li class="cart-price">€@php echo $total_amount - Session::get('coupon_amount'); @endphp</li>
                            @else
                                <li class="cart-price">€@php echo $total_amount; @endphp</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
							@foreach($mainCategories as $cat)
								@if($cat->status == "1")
                                    <li><a href="{{asset('products/'.$cat->url)}}">{{$cat->name}}</a></li>
                                    <!-- class="active"  -->
								@endif
							@endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li> <!-- class="active" nel <li> per rendere attiva --> 
                        <li><a href="#">Outlet</a></li>
                        </li>
                        @if(!empty(Auth::check()))
                        <li><a href="#">Account</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/account-informations') }}">Account informations</a></li>
                                <li><a href="{{ url('/update-user-pwd') }}">Update password</a></li>
                                <li><a href="{{ url('/orders') }}">Your orders</a></li>
                            </ul>
                        </li>
                        @endif
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{url('/wishlist')}}">Wishlist</a></li>
                                <li><a href="{{ url('./cart') }}">Shopping Cart</a></li>
                                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/user-register') }}">Register</a></li>
									<li><a href="{{ url('/user-login') }}"><i class="fa fa-lock"></i> Login</a></li>
								@else
                                    <li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out "></i> Logout</a></li>
								@endif
                            </ul>
                        </li>
                        <li><a href="#">Help</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/contact-us') }}">Contact us</a></li>
                                <li><a href="{{ url('/faq') }}">FAQs</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->