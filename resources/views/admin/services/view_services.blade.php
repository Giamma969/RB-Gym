@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Services</a> <a href="#" class="current">View services</a> </div>
    <h1>Services</h1>
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
            <h5>View services</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Service name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($serviceDetails as $service)
                <tr class="gradeX">
                  <td>{{$service->id}}</td>
                  <td>{{$service->service_name}}</td>
                  <td>{{$service->description}}</td>
                  <td>
                    <a style="width:90%;"  href="#myModal{{$service->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                  </td>
                </tr>
                <div id="myModal{{$service->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>{{$service->service_name}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Service ID: </b> {{$service->id}}</p>
                    <p><b>Service name code: </b> {{$service->service_name}}</p>
                    <p><b>Description: </b> {{$service->description}}</p>
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