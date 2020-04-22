<?php
	use App\Http\Controllers\Controller;
	use App\Product;
	$mainCategories= Controller::mainCategories();
	Product::createCartIfNotExists();
	Product::createWishlistIfNotExists();
	$cartCount = Product::cartCount();
	$wishedProducts = Product::countWishedProducts();
?>
	 	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a><i class="fa fa-phone"></i>+39 0863738210</a></li>
								<li><a><i class="fa fa-envelope"></i>info@rb-gym.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/" target="_blank" ><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/explore" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('/') }}"><img src="{{asset('images/frontend_images/home/logo.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
								<li class="dropdown"><a href="#"><i class="fa fa-shopping-cart"></i>Shop</a>
                                    <ul role="menu" class="sub-menu">
										 @foreach($mainCategories as $cat)
                                        	@if($cat->status == "1")
												<li style="display:block !important;"><a style="background-color:rgb(102,102,102); " href="{{asset('products/'.$cat->url)}}">{{$cat->name}}</a></li>
											@endif
										@endforeach
                                    </ul>
                                </li>
								<li><a href="{{ url('/contact-us') }}"><i class="fa fa-envelope"></i> Contact</a></li>
								<li><a href="{{ url('/wishlist') }}"><i class="fa fa-star"></i> Wishlist ({{$wishedProducts}}) </a></li>
								<li><a href="{{ url('/orders') }}"><i class="fa fa-crosshairs"></i> Orders </a></li>
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart ({{$cartCount}})</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
								@else
									<li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out "></i> Logout</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<!-- <div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> -->
						<?php /*<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('/') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										 @foreach($mainCategories as $cat)
                                        	@if($cat->status == "1")
												<li><a href="{{asset('products/'.$cat->url)}}">{{$cat->name}}</a></li>
											@endif
										@endforeach
                                    </ul>
                                </li>
								<li><a href="{{ url('/contact-us') }}">Contact</a></li>
							</ul>
						</div> */?>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
						<form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }}
							<input type="text" placeholder="Search Products" name="product"/>
							<button type="submit" style="margin-top:0px;" class="btn btn-primary" >Go</button>
							<!-- style="border:0px; heigth:30px; margin-left:-3px;" -->
						</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->