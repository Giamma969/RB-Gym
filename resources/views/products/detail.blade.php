@php
	use App\Product;
	if(Product::hasReview($productDetails->id))
		$reviewDetails = Product::getReviewsDetails($productDetails->id);
@endphp
 

 @extends('layouts.frontLayout.front_design')
 @section('content')
 
 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Detail</span>
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
<section class="product-shop spad page-details">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('layouts.frontLayout.front_sidebar')
            </div>
            <div class="col-lg-9">
                <form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart' )}}" method="post"> {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                        <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                        <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                        <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
                        <input type="hidden" name="price" value="{{ $productDetails->price }}">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset('images/backend_images/products/large/'.$productDetails->image) }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{asset('images/backend_images/products/medium/'.$productDetails->image) }}">
                                        <img src="{{asset('images/backend_images/products/medium/'.$productDetails->image) }}" alt="">
                                    </div>
                                    @foreach($productAltImages as $altimage)
                                    <div class="pt" data-imgbigurl="{{ asset('images/backend_images/products/medium/'.$altimage->image) }}">
                                        <img src="{{ asset('images/backend_images/products/medium/'.$altimage->image) }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$categoryDetails->name}}</span>
                                    <h3>{{$productDetails->product_name}}</h3>
                                </div>
                                <input id="avg" name="avg" type="hidden" value="{{ $ratingAvg }}">
                                <br>
                                    <!-- reviews for this product -->
                                <div style="margin-bottom:-3px;" class="pd-rating"><span>{{$countReviews}} reviews for this product<span></div>
                                <div id="rating_avg"> </div>
                                <div style="margin-top:-3px;" class="pd-rating"><span>{{$ratingAvg}}/5<span></div>
                                
                                <!-- <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div> -->
                                <div class="pd-desc">
                                    <p><!-- description --></p>
                                    <h4>€{{$productDetails->price}} <span>629.99</span></h4>
                                    <br>
                                    <!-- <div class="p-code">Product code : {{$productDetails->product_code}}</div> -->
                                    <p><b>Product code : {{$productDetails->product_code}}</b></p>
                                    <p><b>Brand: </b> {{ $productDetails ->brand }}</p>
                                    <p><b>Condition: </b>New</p>
                                    <p><b>Color: </b> {{ $productDetails ->product_color}}</p>
                                    <p><b>Availability: </b>@if($productDetails->stock > 0) {{$productDetails->stock}} in stock @else Out of stock @endif </p>
                                    <ul class="pd-tags">
                                        <li><span>CATEGORIES</span>: {{$categoryDetails->name}}</li>
                                    </ul>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1" required>
                                    </div>
                                    @if($productDetails->stock > 0)
                                        <button type="submit" class="primary-btn pd-cart">Add To Cart</button>
                                    @endif
                                </div>
                                
                                <div class="pd-share">
                                   
                                    <div class="pd-social" style="margin-top: 20px!important;">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                    @if(Product::checkIfWished($productDetails->id))
                                        <a href="{{ url('/remove-wishlist/'.$productDetails->id) }}" class="primary-btn pd-cart">Remove to Wishlist</a>
                                    @else
                                        <a href="{{ url('/add-wishlist/'.$productDetails->id) }}" class="primary-btn pd-cart">Add to Wishlist</a>
                                    @endif
                                </div>
                            </div>
                        </div>   
                    </div>
                </form>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Features</h5>
                                            <p>{{$productDetails->description}}</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Product Code</td>
                                            <td>
                                                <div class="p-code">{{$productDetails->product_code}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">€{{$productDetails->price}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                @if($productDetails->stock > 0)
                                                    <div class="p-stock">{{$productDetails->stock}} in stock</div>
                                                @else
                                                    <div class="p-stock">Not in stock</div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Weight</td>
                                            <td>
                                                <div class="p-weight">1,3kg</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td><span class="p-stock">{{$productDetails->product_color}}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    @if(Product::hasReview($productDetails->id))
                                        @php $count_reviews=Product::countReviews($productDetails->id); @endphp
                                        <input type="hidden" id="count_review" value="{{ $count_reviews }}">

                                        <h4>{{$count_reviews}} Comments</h4>
                                        <div class="comment-option">
                                            @foreach($reviewDetails as $review)
                                                <?php
                                                    $timestamp =$review->created_at; 
                                                    $timestamp = new DateTime($timestamp); 
                                                    $date = $timestamp->format('d-m-Y');
                                                    $time = $timestamp->format('H:i');
                                                ?>
                                                <div class="co-item">
                                                    <div class="avatar-text">
                                                        <!-- <div style="margin-bottom:-3px;" class="pd-rating"><span>{{$countReviews}} reviews for this product<span></div> -->
                                                        
                                                        <!-- <div style="margin-top:-3px;" class="pd-rating"><span>{{$ratingAvg}}/5<span></div> -->
                                                        
                                                        <h5>{{$review->name}}<span>{{$date}} {{$time}}</span></h5>
                                                        
                                                        <div class="rate" >
                                                            {{$review->rating}}
                                                        </div>
                                                        <h5 style="margin-bottom:0px;">{{$review->title}}</h5>
                                                        <div class="at-reply">{{$review->description}}</div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    @else
                                        there are no review!
                                    @endif
                                    <br>
                                    @if(Auth::check()) 
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form name="review_form" id="review_form" method="post" action="{{ url('/add-review') }}" class="comment-form">{{csrf_field()}}
                                                <input type="hidden" name="product_id1"  value="{{$productDetails->id}}">
                                                <div class="row">
                                                    <div class="col-lg-6" style="float:left; margin-top:30px;" >
                                                        <input type="text" name="review_title" id="review_title" placeholder="Title" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="review_description" id="review_description" form="review_form" placeholder="Describe your review" required></textarea>
                                                        <div style="margin-bottom:-3px;" class="pd-rating"><span>Your rating<span></div>
                                                        <input type="hidden" name="review_rating" id="review_rating"> 
                                                        <div style="float:left" id="insert_rating"></div>
                                                        <button type="submit" class="site-btn" style="float:right;">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProducts->chunk(4) as $chunk)
                @foreach($chunk as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="{{ url('product/'.$item->id) }}">
                                    <img src="{{asset('images/backend_images/products/medium/'.$item->image) }}" alt="">
                                </a>
                                <div class="sale">Sale</div>
                                <div class="icon"></div>
                                <ul>
                                    <li class="w-icon active">
                                        @if(Product::checkIfWished($item->id))
                                            <a href="{{ url('/remove-wishlist/'.$item->id) }}"><i class="icon_heart"  aria-hidden="true"></i></a>
                                        @else
                                            <a href="{{ url('/add-wishlist/'.$item->id) }}"><i class="icon_heart_alt"  aria-hidden="true"></i></a>
                                        @endif
                                    </li>
                                    <li class="quick-view">
                                        <a class="a_view_product" href="{{ url('product/'.$item->id) }}">View product</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$item->category_name}}</div>
                                <a href="{{ url('product/'.$item->id) }}">
                                    <h5>{{$item->product_name}}</h5>
                                </a>
                                <div class="product-price">
                                    {{$item->price}}
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->

@endsection