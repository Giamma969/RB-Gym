@php
	use App\Product;
	if(empty($search_product)){
		$productSubcatCount= Product::productSubcatCount($categoryDetails->id);
	}else{
		$count_search_product = Product::countSearchProducts($search_product);
	}
@endphp

@extends('layouts.frontLayout.front_design')

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<a href="#"><i class="fa fa-home"></i> Home</a>
					<span>Shop</span>
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
				<div class="filter-widget" style="margin-bottom:5px;">
				@if(!empty($search_product))
					<h4 style="text-align:center; font-size:30px;" class="fw-title" >Products for "{{ $search_product }}"</h4>
				@else
					<h4 style="text-align:center; font-size:30px;" class="fw-title" >{{ $categoryDetails->name }}</h4>
				</div>
				@endif
				<div class="product-show-option">
					<div class="row">
						<div class="col-lg-7 col-md-7">
							<div class="select-option">
								<form id="form_listing" name="form_listing" method="post" action="{{ url('products/'.$url)}}">{{csrf_field()}}
								</form>
									<select id="sorting" name="sorting" form="form_listing" class="sorting" onchange="javascript:this.form.submit()">
										<option value="alpha" 		@if(Session::get('sorting') == "alpha") selected @endif>Sort alphabetically</option>
										<option value="price_asc"	@if(Session::get('sorting')  == "price_asc") selected @endif>Sort by rising price</option>
										<option value="price_desc"	@if(Session::get('sorting')  == "price_desc") selected @endif>Sort by decreasing price</option>
										<option value="recent"		@if(Session::get('sorting')  == "recent") selected @endif>Sort by most recent</option>
									</select>
									<select id="paginate" name="paginate" form="form_listing" class="show_paginate" onchange="javascript:this.form.submit()">
										<option value="3"	@if(Session::get('paginate')  == "3") selected @endif>3 products for page</option>
										<option value="6"	@if(Session::get('paginate')  == "6") selected @endif>6 products for page</option>
										<option value="9" 	@if(Session::get('paginate')  == "9") selected @endif>9 products for page</option>
										<option value="12"	@if(Session::get('paginate')  == "12") selected @endif>12 products for page</option>
									</select>
								
							</div>
						</div>
						<div class="col-lg-5 col-md-5 text-right">
							<p>Show {{$start}} - {{$end}} Of {{$count_products}} Product</p>
						</div>
					</div>
				</div>
				<div class="product-list">
					<div class="row">
						@foreach($productsAll as $product)
							<div class="col-lg-4 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										<a href="{{ url('product/'.$product->id) }}">
											<img src="{{asset('images/backend_images/products/medium/'.$product->image)}}" alt="">
										</a>
										@if($product->in_sale == 1)<div class="sale">Sale</div>@endif
										<div class="icon"></div>
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
										<div class="catagory-name">{{$product->category_name}}</div>
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
					@if(empty($search_product))
						<div style="padding-left:40%;">{{ $productsAll->links() }}</div> 
					@endif 
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Shop Section End -->

@endsection