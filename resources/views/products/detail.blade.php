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

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Kids</a></li>
                    </ul>
                </div>
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
                                    <span>oranges</span>
                                    <h3>{{$productDetails->product_name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
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
                                    <p><b>Brand:</b> {{ $productDetails ->brand }}</p>
                                    <p> <b>Stock:</b> @if($productDetails->stock > 0) In stock @else Out of stock @endif </p>
                                    <p><b>Condition:</b>New</p>
                                    <p><b>Color:</b> {{ $productDetails ->product_color}}</p>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        <div class="cc-item">
                                            <input type="radio" id="cc-black">
                                            <label for="cc-black"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-yellow">
                                            <label for="cc-yellow" class="cc-yellow"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-violet">
                                            <label for="cc-violet" class="cc-violet"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1" required>
                                    </div>
                                    @if($productDetails->stock > 0)
                                        <button type="submit" class="primary-btn pd-cart">Add To Cart</button>
                                    @endif
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Product code : {{$productDetails->product_code}}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
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
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5>Introduction</h5>
                                            <p>{{$productDetails->description}}</p>
                                            <h5>Features</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
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
                                            <td class="p-catagory">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">$495.00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Add To Cart</td>
                                            <td>
                                                <div class="cart-add">+ add to cart</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                <div class="p-stock">22 in stock</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Weight</td>
                                            <td>
                                                <div class="p-weight">1,3kg</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Size</td>
                                            <td>
                                                <div class="p-size">Xxl</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td><span class="cs-color"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">00012</div>
                                            </td>
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
                                <img src="{{asset('images/backend_images/products/medium/'.$item->image) }}" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
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