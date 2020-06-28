@php
	use App\Product;
	if(Product::hasReview($productDetails->product_id))
		$reviewDetails = Product::getReviewsDetails($productDetails->product_id);
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
                    <span>Detail product</span>
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
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset('images/backend_images/products/large/'.$productDetails->product_image) }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{asset('images/backend_images/products/large/'.$productDetails->product_image) }}">
                                        <img src="{{asset('images/backend_images/products/medium/'.$productDetails->product_image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$productDetails->category_name}}</span>
                                    <h3>{{$productDetails->product_name}}</h3>
                                </div>
                                
                                
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
                                        <h4>€{{$productDetails->product_price}}</h4>
                                    <br>
                                    <!-- <div class="p-code">Product code : {{$productDetails->product_code}}</div> -->
                                    <p><b>Product code : {{$productDetails->product_code}}</b></p>
                                    @if(!empty($productDetails->product_brand))<p><b>Brand: </b> {{ $productDetails->product_brand }}</p>@endif
                                    <p><b>Condition: </b>New</p>
                                    <p><b>Color: </b> {{ $productDetails->product_color}}</p>
                                    <ul class="pd-tags">
                                        <li><span>CATEGORIES</span>: {{$productDetails->category_name}}</li>
                                    </ul>
                                </div>
                                
                                
                                <div class="pd-share">
                                   
                                    <div class="pd-social" style="margin-top: 20px!important;">
                                        @if(!empty($cmsDetails->facebook))
                                            <a href="{{$cmsDetails->facebook}}" target="_blank"><i class="ti-facebook"></i></a>
                                        @endif
                                        @if(!empty($cmsDetails->twitter))
                                            <a href="{{$cmsDetails->twitter}}" target="_blank"><i class="ti-twitter-alt"></i></a>
                                        @endif
                                        @if(!empty($cmsDetails->instagram))
                                            <a href="{{$cmsDetails->instagram}}" target="_blank"><i class="ti-instagram"></i></a>
                                        @endif
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
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Features</h5>
                                            <p style="white-space:pre-wrap;">{{$productDetails->product_description}}</p>
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
                                                <div class="p-price">€{{$productDetails->product_price}}</div>
                                            </td>
                                        </tr>
                                         <tr>
                                         @if(!empty($productDetails->product_brand))
                                            <td class="p-catagory">Brand</td>
                                            <td>
                                                <div class="p-code">{{$productDetails->product_brand}}</div>
                                            </td>
                                        @endif
                                        </tr>
                                        

                                        @if(!empty($productDetails->product_color))
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td><span class="p-code">{{$productDetails->product_color}}</span></td>
                                        </tr>
                                        @endif
                                        @if(!empty($productDetails->product_height) && !empty($productDetails->product_width) && !empty($productDetails->product_depth))
                                            <tr>
                                                <td class="p-catagory">Dimensions</td>
                                                <td>
                                                    <div class="p-code">{{$productDetails->product_height}} x {{$productDetails->product_width}} x {{$productDetails->product_depth}} cm</div>
                                                </td>
                                            </tr>
                                            <tr>
                                        @elseif(!empty($productDetails->product_height) && !empty($productDetails->product_width) && empty($productDetails->depth))
                                            <tr>
                                                <td class="p-catagory">Dimensions</td>
                                                <td>
                                                    <div class="p-code">{{$productDetails->product_height}} x {{$productDetails->product_width}} cm</div>
                                                </td>
                                            </tr>
                                            <tr>
                                        @endif

                                        @if(!empty($productDetails->product_material))
                                            <tr>
                                                <td class="p-catagory">Material</td>
                                                <td>
                                                    <div class="p-code">{{$productDetails->product_material}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                        @endif

                                        @if(!empty($productDetails->product_weight))
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-code">{{$productDetails->product_weight}} kg</div>
                                                </td>
                                            </tr>
                                        @endif

                                        @if(!empty($productDetails->product_max_load))
                                            <tr>
                                                <td class="p-catagory">Maximum load supported</td>
                                                <td>
                                                    <div class="p-code">{{$productDetails->product_max_load}} kg</div>
                                                </td>
                                            </tr>
                                        @endif

                                        
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
                                                        <div class="at-reply" style="white-space:pre-wrap;">{{$review->description}}</div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    @else
                                        there are no review!
                                    @endif
                                    <br>
                                    
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


@endsection