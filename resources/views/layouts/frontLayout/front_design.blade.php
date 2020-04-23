<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RB-Gym</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css styles -->
    <link href="{{asset('css/frontend_css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/elegant-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/jquery.rateyo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/nice-select.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/slicknav.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/frontend_css/themify-icons.css')}}" rel="stylesheet" type="text/css">   
    <link href="{{asset('css/frontend_css/passtrength.css')}}" rel="stylesheet" type="text/css">  
   <!--  <link rel="shortcut icon" href="images/ico/favicon.ico"> -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/frontend_images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/frontend_images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/frontend_images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/frontend_images/ico/apple-touch-icon-57-precomposed.png')}}"> -->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('layouts.frontLayout.front_header')
    @yield('content')	
    @include('layouts.frontLayout.front_footer')
    <script src="{{asset('js/frontend_js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery-ui.min.js')}}"></script>    	
	<script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.rateyo.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/owl.carousel.min.js')}}"></script>   
    <!-- <script src="https://code.jquery.com/ui/1.12.4/jquery-ui.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="{{asset('js/frontend_js/main.js')}}"></script>
    <script src="{{asset('js/frontend_js/main2.js')}}"></script>
    <script src="{{asset('js/frontend_js/passtrength.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/frontend_js/stripe_payment.js')}}"></script>    
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
  
</body>
</html>