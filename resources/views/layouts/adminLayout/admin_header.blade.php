<!--Header-part-->
<div id="header">
  <div style="padding-left: 18px; padding-top: 10px;">
    <a href="{{ url('/admin/dashboard')}}">
      <img width="180px"src="{{asset('images/frontend_images/logo6.png')}}" alt="">
    </a>
  </div>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
  
    <li class=""><a title="" href="{{ url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="{{ url('logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->
