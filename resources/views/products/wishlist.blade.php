@extends('layouts.frontLayout.front_design')
@section('content')
@php use App\Product; @endphp
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
					<span>Wishlist</span>
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
<!-- Product Shop Section Begin -->
<section class="product-shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
				@include('layouts.frontLayout.front_sidebar')
			</div>
			<div class="col-lg-9 order-1 order-lg-2">
				<div class="filter-widget" style="margin-bottom:50px;">
					<h4 style="text-align:center; font-size:30px;" class="fw-title" >Your wishlist</h4>
				</div>
				<div class="product-list">
					<div class="row">
						@foreach($productsWish as $product)
							<div class="col-lg-4 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										<a href="{{ url('product/'.$product->id) }}">
											<img src="{{asset('images/backend_images/products/medium/'.$product->image)}}" alt="">
										</a>
											@if($product->in_sale == 1)<div class="sale">Sale</div>@endif
										<div class="icon">
										</div>
										<ul>
											<li class="w-icon active">
												@if(Product::checkIfWished($product->id))
													<a href="{{ url('/remove-wishlist/'.$product->id) }}"><i class="icon_heart"  aria-hidden="true"></i></a>
												@else
													<a href="{{ url('/add-wishlist/'.$product->id) }}"><i class="icon_heart_alt"  aria-hidden="true"></i></a>
												@endif
											</li>
											<li class="quick-view">
												<a class="a_view_product" href="{{ url('product/'.$product->id) }}">View product</a>
											</li>
										</ul>
									</div>
									<div class="pi-text">
										<div class="catagory-name"><?php //{{$product->category_name}} ?></div>
										<a href="{{ url('product/'.$product->id) }}">
											<h5>{{$product->product_name}}</h5>
										</a>
										<div class="product-price">
											@if($product->in_sale == 1)
												€{{$product->new_price}}
												<span>€{{$product->price}}</span>
											@else
											€{{$product->price}}
											@endif
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="loading-more">
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Shop Section End -->


@endsection