@extends('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{asset('/')}}"><i class="fa fa-home"></i> Home</a>
                    @if(!empty($brandDetails->name))<span>{{$brandDetails->name}}</span>@endif
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
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align:center;">
                            @if(!empty($brandDetails->logo))<img class="product-big-img" src="{{asset('images/backend_images/brands/medium/'.$brandDetails->logo) }}" width="250px" alt="">@endif
                        </div>
                    </div>  
                </div>
                <div class="product-tab" style="padding-top:30px !important;">
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if(empty($brandDetails->name) && empty($brandDetails->logo) && empty($brandDetails->description))<p>This brand  does not exists.</p> @endif

                                            @if(!empty($brandDetails->name))<h5>About {{$brandDetails->name}}</h5>@endif

                                            @if(!empty($brandDetails->description))<p style="white-space:pre-wrap;">{{$brandDetails->description}}</p>@endif
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
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