@extends('layouts.frontLayout.front_design')
@section('content')

<section>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>Via Vetoio, 48, 67100 Coppito AQ</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+39 333 32 333 32</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>rb-gym@info.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <form id="main-contact-form" class="comment-form" name="contact-form" method="post" action="{{ url('/contact-us' )}}"> {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="name" required="required" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" name="email" required="required" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-6" style="flex:0 0 100%; max-width:100%;">
                                        <input type="text" name="subject" required="required" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" id="message" required="required" placeholder="Your message here"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
</section>
@endsection
	
	