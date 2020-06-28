@php
	use App\Product;
	$productAllCount=Product::productAllCount();
@endphp


@extends('layouts.frontLayout.front_design')

@section('content')
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
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        @foreach($banners as $banner)
            <div class="single-hero-items set-bg" data-setbg="{{asset('images/frontend_images/banners/'.$banner->image)}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- <span>Bag,kids</span> -->
                            <h1>{{$banner->title}}</h1>
                            <p>{{$banner->description}}</p>
                            <a href="{{ url('products/'.$banner->link) }}" class="primary-btn">Discover more</a>
                        </div>
                    </div>
                    <!-- <div class="off-card">
                        <h2>Sale <span>20%</span></h2>
                    </div> -->
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <a href="{{asset('products/'.$first_grid->url)}}">
                        <img src="{{asset('images/backend_images/homepages/'.$homepage->first_grid_image)}}" height="261px" width="392px" alt="">
                        <div class="inner-text">
                            <h4>{{$first_grid->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <a href="{{asset('products/'.$second_grid->url)}}">
                        <img src="{{asset('images/backend_images/homepages/'.$homepage->second_grid_image)}}" height="261px" width="392px" alt="">
                        <div class="inner-text">
                            <h4>{{$second_grid->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <a href="{{asset('products/'.$third_grid->url)}}">
                        <img src="{{asset('images/backend_images/homepages/'.$homepage->third_grid_image)}}" height="261px" width="392px" alt="">
                        <div class="inner-text">
                            <h4>{{$third_grid->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div style="width:309px!important; height:620px!important;" class="product-large set-bg" data-setbg="{{asset('images/backend_images/homepages/'.$homepage->first_slider_image)}}">
                    <h2>{{$first_slider->name}}</h2>
                    <a href="{{ url('products/'.$first_slider->url) }}">Discover More</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <a href="{{ url('products/'.$first_slider->url) }}"><h2>{{$first_slider->name}}</h2></a>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach($products_first_slider as $product)
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
                                <div class="catagory-name">{{$product->category_name}}</div>
                                <a href="{{ url('product/'.$product->id) }}">
                                    <h5>{{$product->product_name}}</h5>
                                </a>
                                <div class="product-price">
                                    @if($product->in_sale == 1)
                                        €{{$product->new_price}}
                                        <span>€{{$product->new_price}}</span>
                                    @else
                                        €{{$product->price}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->

<!-- Middle image Section Begin-->
<section class="deal-of-week set-bg spad" >
    <img src="{{asset('images/backend_images/homepages/'.$homepage->middle_image)}}">
</section>
<!-- Middle image Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <a href="{{ url('products/'.$second_slider->url) }}"><h2>{{$second_slider->name}}</h2></a>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach($products_second_slider as $product)
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="{{ url('product/'.$product->id) }}">
                                    <img src="{{asset('images/backend_images/products/medium/'.$product->image)}}" alt="">
                                </a>
                                    @if($product->in_sale)<div class="sale">Sale</div>@endif
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
                                <div class="catagory-name">{{$product->category_name}}</div>
                                <a href="{{ url('product/'.$product->id) }}">
                                    <h5>{{$product->product_name}}</h5>
                                </a>
                                <div class="product-price">
                                    @if($product->in_sale == 1)
                                        €{{$product->new_price}}
                                        <span>€{{$product->new_price}}</span>
                                    @else
                                        €{{$product->price}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div style="width:309px!important; height:620px!important;" class="product-large set-bg m-large" data-setbg="{{asset('images/backend_images/homepages/'.$homepage->second_slider_image)}}">
                    <h2>{{$second_slider->name}}</h2>
                    <a href="{{ url('products/'.$second_slider->url) }}">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->


<!-- <section class="man-banner spad"> -->
    <div class="container-fluid" style="margin-top:200px;">
        <div class="row">
            <div class="col-lg-12" style="background-color:rgb(235,235,235);">
                <div class="filter-control">
                    <h2>OUR BRANDS</h2>
                </div>
                <div class="logo-carousel owl-carousel">
                    @foreach($brands as $brand)
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="{{ url('brand/'.$brand->name) }}">
                                    <img src="{{asset('images/backend_images/brands/medium/'.$brand->logo)}}" alt="">
                                </a>
                                <div class="icon">
                                </div>
                                <ul></ul>
                            </div>
                            <div class="pi-text">
                                <!-- <div class="catagory-name">{{$brand->name}}</div> -->
                                <a href="{{ url('brand/'.$brand->name) }}">
                                    <h5>{{$brand->name}}</h5>
                                </a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- <div class="col-lg-3 offset-lg-1">
                <div style="width:309px!important; height:620px!important;" class="product-large set-bg m-large" data-setbg="{{asset('images/backend_images/homepages/'.$homepage->second_slider_image)}}">
                    <h2>{{$second_slider->name}}</h2>
                    <a href="{{ url('products/'.$second_slider->url) }}">Discover More</a>
                </div>
            </div> -->
        </div>
    </div>
<!-- </section> -->


<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{asset('images/frontend_images/icon-1.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over €{{$shippingDetails->free_shipping}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{asset('images/frontend_images/icon-2.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="{{asset('images/frontend_images/icon-1.png')}}" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Fast delivery</h6>
                            <p>Delivery in {{$shippingDetails->estimate_delivery_start}}-{{$shippingDetails->estimate_delivery_end}} days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->
@endsection
