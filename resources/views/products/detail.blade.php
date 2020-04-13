@php
	use App\Product;
	if(Product::hasReview($productDetails->id))
		$reviewDetails = Product::getReviewsDetails($productDetails->id);
@endphp
 

 @extends('layouts.frontLayout.front_design')
 @section('content')
 
 <section>
	<div class="container">
		<div>
			<ol class="breadcrumb">	@php echo $breadcrumb; @endphp</ol>
		</div>
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
			
			<div class="col-sm-3">
				@include('layouts.frontLayout.front_sidebar')
			</div>
				
			<div class="col-sm-9 padding-right">
				<div class="product-details">
					<div class="col-sm-5">
						<div class="view-product">
							<a href=" {{asset('images/backend_images/products/large/'.$productDetails->image) }} ">
								<img style="width:300px;" class="mainImage" src="{{asset('images/backend_images/products/medium/'.$productDetails->image)}} " alt="" />
							</a>
						</div>
						<div style="margin-top:50px;" id="similar-product" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active thumbnails">
									<img class="changeImage" style="width:80px; cursor:pointer;" src="{{ asset('images/backend_images/products/small/'.$productDetails->image) }}"  alt="">
									@foreach($productAltImages as $altimage)
										<img class="changeImage" style="width:80px; cursor:pointer;" src="{{ asset('images/backend_images/products/small/'.$altimage->image) }}"  alt="" />
									@endforeach 
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart' )}}" method="post"> {{ csrf_field() }}
							<input type="hidden" name="product_id" value="{{ $productDetails->id }}">
							<input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
							<input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
							<input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
							<input type="hidden" name="price" value="{{ $productDetails->price }}">
							<div class="product-information">
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $productDetails -> product_name }}</h2>
								<p><b>Product code:</b> {{ $productDetails -> product_code }}</p>
								<p><b>Brand:</b> {{ $productDetails ->brand }}</p>
								<p><b>Color:</b> {{ $productDetails ->product_color }}</p>
								<span>
									<span>EUR € {{ $productDetails -> price }}</span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="1" required/>
								</span>
								<?php if($productDetails->stock > 0) { ?>
										<button type="submit" class="btn btn-default cart" id="cartButton">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									<?php } ?>
								<br>
								<br>
								<p><b>Stock:</b> <?php if($productDetails->stock > 0)  {?>In stock<?php } else { ?>Out of stock<?php } ?></p>
								<p><b>Condition:</b>New</p>
								<input id="avg" name="avg" type="hidden" value="{{ $ratingAvg }}">
								<br>
								{{$countReviews}} reviews for this product
								<div id="rating_avg"> </div>
								{{$ratingAvg}}/5 
								<br>								
							</div>
						</form>
					</div>
				</div>
				
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a class="active" href="#reviews" data-toggle="tab">Reviews</a></li>
							<li><a href="#description" data-toggle="tab">Product description</a></li>
							<li><a href="#technical_specifications" data-toggle="tab">Technical specifications</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="reviews" >
							<div class="col-sm-12">	
								@if(Product::hasReview($productDetails->id))
									@php $count_reviews=Product::countReviews($productDetails->id); @endphp
									<input type="hidden" id="count_review" value="{{ $count_reviews }}">
									
									@foreach($reviewDetails as $review)
										<?php
											$timestamp =$review->created_at; 
											$timestamp = new DateTime($timestamp); 
											$date = $timestamp->format('d-m-Y');
											$time = $timestamp->format('H:i');
										?>
											
										<ul>
											<li><a href=""><i class="fa fa-user"></i>{{$review->name}}</a></li>
											<li><a href=""><i class="fa fa-clock-o"></i>{{$time}}</a></li>
											<li><a href=""><i class="fa fa-calendar-o"></i>{{$date}} </a></li>
										</ul>
										
										<!-- div for rating stairs -->
										<div class="rate" >
										{{$review->rating}}
										</div>
											
											
										<input type="hidden" value="{{$review->rating}}">
										<h4>{{$review->title}}</h4>
										<p>{{$review->description}}</p>
										
										<hr>
									@endforeach
								@else
									<p>There are no reviews for this product</p><hr>
								@endif
							
								@if(Auth::check())  
									<p><b>Write Your Review</b></p>
									<form name="review_form" id="review_form" method="post" action="{{ url('/add-review') }}">{{csrf_field()}}
										<input type="hidden" name="product_id1"  value="{{$productDetails->id}}">
										<span>
											<input type="text" name="review_title" id="review_title" placeholder="Title" style="margin-left:0px !important" required/>
										</span>
										<textarea name="review_description" id="review_description" form="review_form" placeholder="Describe your review" required></textarea>
										<b>Rating: </b>
										<input type="hidden" name="review_rating" id="review_rating"> 
										<div id="insert_rating"></div>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								@endif
							</div>			
						</div>
						<div class="tab-pane fade" id="description" >
							<div class="col-sm-12">
								<pre> {{ $productDetails -> description }}</pre>
							</div>
						</div>
						<div class="tab-pane fade" id="technical_specifications" >
							<div class="col-sm-12">
								<p> </p>
							</div>
						</div>		
					</div>
				</div><!--/category-tab-->
				
				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Recommended items</h2>
					
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php $count=1; ?>
							@foreach($relatedProducts->chunk(3) as $chunk)
								<div <?php if($count==1){ ?> class="item active" <?php } else{ ?> class="item" <?php } ?>>	
									@foreach($chunk as $item)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{ url('product/'.$item->id) }}">
															<img style="width:180px;" src="{{ asset('images/backend_images/products/small/'.$item->image) }}" alt="" />
													</a>
													<h2>€ {{ $item -> price }}</h2>
													<p>{{ $item -> product_name }}</p>
													<a href="{{ url('product/'.$item->id) }}">
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>
														Add to cart
													</button>
													</a>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							@php $count++; @endphp
							@endforeach
						</div>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
						</a>			
					</div>
				</div>
				<!--/recommended_items-->
			</div>
		</div>
	</div>
</section>

@endsection