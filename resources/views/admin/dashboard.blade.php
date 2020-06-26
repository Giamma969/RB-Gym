@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content" style="height:110%;">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
@if(Session::has('flash_message_error'))
  <div class="alert alert-error alert-block" >
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
<!--Action boxes-->
  

<!--end-main-container-part-->
@endsection
