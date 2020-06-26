@extends('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{asset('/')}}"><i class="fa fa-home"></i> Home</a>
                    <span>About Us</span>
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
                <h2>About us</h2>
                <div class="product-tab" >
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if(!empty($cmsDetails->title_first_section_about_us))
                                                <h5>{{$cmsDetails->title_first_section_about_us}}</h5>
                                            @endif
                                            @if(!empty($cmsDetails->first_section_about_us)) 
                                                <p style="white-space:pre-wrap;">{{$cmsDetails->first_section_about_us}}</p>
                                            @endif
                                            <br>
                                            @if(!empty($cmsDetails->title_second_section_about_us))
                                                <h5>{{$cmsDetails->title_second_section_about_us}}</h5>
                                            @endif
                                            @if(!empty($cmsDetails->second_section_about_us)) 
                                                <p style="white-space:pre-wrap;">{{$cmsDetails->second_section_about_us}}</p>
                                            @endif
                                            <br>
                                            @if(!empty($cmsDetails->title_third_section_about_us))
                                                <h5>{{$cmsDetails->title_third_section_about_us}}</h5>
                                            @endif
                                            @if(!empty($cmsDetails->third_section_about_us)) 
                                                <p style="white-space:pre-wrap;">{{$cmsDetails->third_section_about_us}}</p>
                                            @endif
                                            <br>
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