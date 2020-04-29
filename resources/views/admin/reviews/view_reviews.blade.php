@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Reviews</a> <a href="#" class="current">View reviews</a> </div>
    <h1>Reviews</h1>
    @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
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
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($reviewsDetails as $review)
                <tr class="gradeX">
                  <td>{{$review->id}}</td>
                  <td>{{$review->rating}}</td>
                  <td>{{$review->title}}</td>
                  <td> <div style="max-width:35ch; overflow:auto; max-height:120px!important;">{{$review->description}}</div></td>
                  <td>{{$review->product_id}}</td>
                  <td>{{$review->product_name}}</td>
                  <td>{{$review->user_id}}</td>
                  <td>{{$review->email}}</td>
                  <td>{{$review->created_at}}</td>
                  <td>
                    <a style="width:80%;"  href="#myModal{{$review->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                  </td>
                </tr>
                <div id="myModal{{$review->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>{{$review->title}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Review ID: </b> {{$review->id}}</p>
                    <p><b>Rating: </b> {{$review->rating}}</p>
                    <p><b>Title: </b> {{$review->title}}</p>
                    <p><b>Description: </b> {{$review->description}}</p>
                    <p><b>Product ID: </b> {{$review->product_id}}</p>
                    <p><b>Product name: </b> {{$review->product_name}}</p>
                    <p><b>User ID: </b> {{$review->user_id}}</p>
                    <p><b>Email: </b> {{$review->email}}</p>
                    <p><b>Review date: </b> {{$review->created_at}}</p>
                  </div>
                </div>
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