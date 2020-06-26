 <!-- Footer Section Begin -->
 <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo" style="width:60%;">
                            @if(!empty($cmsDetails->logo))
                                <a href="{{url('/')}}"><img src="{{asset('images/frontend_images/logo/'.$cmsDetails->logo )}}" alt=""></a>
                            @endif
                        </div>
                        <ul>
                            @if(!empty($cmsDetails->address))
                                <li>Address: {{$cmsDetails->address}}</li>
                            @endif
                            @if(!empty($cmsDetails->phone))
                                <li>Phone: {{$cmsDetails->phone}}</li>
                            @endif
                            @if(!empty($cmsDetails->email))
                                <li>Email: {{$cmsDetails->email}}</li>
                            @endif
                        </ul>
                        <div class="footer-social">
                            @if(!empty($cmsDetails->facebook))
                                <a href="{{$cmsDetails->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if(!empty($cmsDetails->twitter))
                                <a href="{{$cmsDetails->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if(!empty($cmsDetails->instagram))
                                <a href="{{$cmsDetails->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Store</h5>
                        <ul>
                            <li><a class="a_footer" href="{{ url('/cart') }}">Shopping Cart</a></li>
                            <li><a class="a_footer" href="{{ url('/checkout') }}">Checkout</a></li>
                            <li><a class="a_footer" href="{{url('/wishlist')}}">Wishlist</a></li>
                            <li><a class="a_footer" href="{{ url('/outlet') }}">Outlet</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Account</h5>
                        <ul>
                            
                            <li><a class="a_footer" href="{{ url('/orders') }}">Your orders</a></li>
                            <li><a class="a_footer" href="{{ url('/account-informations') }}">Account information</a></li>
                            <li><a class="a_footer" href="{{ url('/update-user-pwd') }}">Update password</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Informations</h5>
                        <ul>
                            <li><a class="a_footer" href="{{ url('/about-us') }}">About Us</a></li>
                            <li><a class="a_footer" href="{{ url('/privacy') }}">Privacy information</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Help</h5>
                        <ul>
                            <li><a class="a_footer" href="{{ url('/faq') }}">FAQs</a></li>
                            <li><a class="a_footer" href="{{ url('/contact-us') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->