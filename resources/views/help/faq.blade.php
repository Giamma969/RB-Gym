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
                        <span>FAQs</span>
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
    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                            @php $count = 1; @endphp
                            @foreach($faqs as $faq)
                                <div class="card">
                                    <div @if($count==1) class="card-heading active" @else class="card-heading"@endif >
                                        <a @if($count==1) class="active" @endif data-toggle="collapse" data-target="#collapse{{$count}}">
                                            {{$faq->question}}
                                        </a>
                                    </div>
                                    <div id="collapse{{$count}}" @if($count==1) class="collapse show"  @else class="collapse" @endif data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->
</section>
@endsection