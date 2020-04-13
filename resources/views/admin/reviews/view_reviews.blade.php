@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Reviews</a> <a href="#" class="current">View reviews</a> </div>
    <h1>Reviews</h1>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-success alert-block">
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View reviews</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Review ID</th>
                  <th>Rating</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Product ID</th>
                  <th>Product name</th>
                  <th>User ID</th>
                  <th>User email</th>
                  <th>Review data</th>
                </tr>
              </thead>
              <tbody>
              @foreach($reviewsDetails as $review)
                <tr class="gradeX">
                  <td>{{$review->id}}</td>
                  <td>{{$review->rating}}</td>
                  <td>{{$review->title}}</td>
                  <td>{{$review->description}}</td>
                  <td>{{$review->product_id}}</td>
                  <td>{{$review->product_name}}</td>
                  <td>{{$review->user_id}}</td>
                  <td>{{$review->email}}</td>
                  <td>{{$review->created_at}}</td>
                </tr>
                
                @endforeach
                 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection