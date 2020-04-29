@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Messages</a> <a href="#" class="current">View messages</a> </div>
    <h1>Messages</h1>
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
            <h5>View messages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>Message ID</th>
                    <th>Customer name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Resolved</th>
                    <th>Operations</th>
                </tr>
              </thead>
              <tbody>
              @foreach($messages as $mes)
                <tr class="gradeX">
                  <td>{{$mes->id}}</td>
                  <td>{{$mes->name}}</td>
                  <td>{{$mes->email}}</td>
                  <td style="max-width:20ch;">{{$mes->subject}}</td>
                  <td> <div style="overflow:auto; max-height:100px!important; max-width:70ch;">{{$mes->message}} </div></td>
                  <td>{{$mes->created_at}}</td>
                  <td>
                    @if($mes->resolved == 0)
                        <span style="color:red">No</span>
                    @else 
                        <span style="color:green">Yes</span>
                    @endif
                </td> 
                  <td style="max-width:50px" class="center">
                    <a style="width:80%;"  href="#myModal{{$mes->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-message/'.$mes->id)  }} "class="btn btn-primary btn-mini" title="Edit">Edit</a>  
                  </td> 
                </tr>
                <div id="myModal{{$mes->id}}" class="modal hide">
                  <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3><b>{{$mes->subject}}</b></h3>
                  </div>
                  <div class="modal-body">
                      <p><b>Message ID: </b> {{$mes->id}}</p>
                      <p><b>Customer name: </b> {{$mes->name}}</p>
                      <p><b>Email: </b> {{$mes->email}}</p>
                      <p><b>Subject: </b> {{$mes->subject}}</p>
                      <p><b>Message: </b> {{$mes->message}}</p>
                      <p><b>Date: </b> {{$mes->created_at}}</p>
                      <p><b>Resolved: </b> 
                      @if($mes->resolved == 0)
                          No
                      @else 
                          Yes
                      @endif
                      </p>
                  </div>
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