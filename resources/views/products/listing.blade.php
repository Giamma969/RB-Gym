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

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
				@include('layouts.frontLayout.front_sidebar')
			</div>
			<div class="col-lg-9 order-1 order-lg-2">
				@if(!empty($search_product))
					
					<h4 class="fw-title" >Products for "{{ $search_product }}"</h4>
				@else
				<div class="filter-widget" style="margin-bottom:5px;">
					<h4 style="text-align:center; font-size:30px;" class="fw-title" >{{ $categoryDetails->name }}</h4>
				</div>
				@endif
				<div class="product-show-option">
					<div class="row">
						<div class="col-lg-7 col-md-7">
							<div class="select-option">
								<select class="sorting">
									<option value="">Default Sorting</option>
								</select>
								<select class="p-show">
									<option value="">Show:</option>
								</select>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 text-right">
							<p>Show 01- 09 Of 36 Product</p>
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
											<img src="{{asset('images/backend_images/products/small/'.$product->image)}}" alt="">
										</a>
										<div class="sale pp-sale">Sale</div>
										<div class="icon">
											@if(Product::checkIfWished($product->id))
												<i class="fa fa-heart" aria-hidden="true"></i>
											@else
												<i class="fa fa-heart-o" aria-hidden="true"></i>
											@endif
										</div>
										<ul>
											<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
											<li class="quick-view">
												@if(Product::checkIfWished($product->id))
													<a href="{{ url('/remove-wishlist/'.$product->id) }}">Remove wishlist</a>
												@else
													<a href="{{ url('/add-wishlist/'.$product->id) }}">Add wishlist</a>
												@endif
											</li>
											<li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
										</ul>
									</div>
									<div class="pi-text">
										<div class="catagory-name">Towel</div>
										<a href="{{ url('product/'.$product->id) }}">
											<h5>{{$product->product_name}}</h5>
										</a>
										<div class="product-price">
											€{{$product->price}}
											<span>$35.00</span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="loading-more">
					@if(empty($search_product))
						<div align="center">{{ $productsAll->links() }}</div> 
					@endif 
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Shop Section End -->

@endsection