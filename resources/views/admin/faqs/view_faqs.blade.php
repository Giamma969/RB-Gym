@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Faqs</a> <a href="#" class="current">View faqs</a> </div>
    <h1>Faqs</h1>
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
          <div class="widget-title"> <span class="icon"><i class="icon-question-sign"></i></span>
            <h5>View faqs</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Faq ID</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Creation date</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($faqs as $faq)
                <tr class="gradeX">
                  <td>{{$faq->id}}</td>
                  <td style="max-width:20ch;">{{$faq->question}}</td>
                  <td><div style="overflow:auto; max-height:100px!important; max-width:25ch;">{{$faq->answer}}</div></td>
                  <td>{{$faq->created_at}}</td>
                  <td>
                    @if($faq->status == 0)
                        <span style="color:red">Inactive</span>
                    @else 
                        <span style="color:green">Active</span>
                    @endif
                  </td>
                  <td style="max-width:40px;" class="center">
                    <a style="width:80%;"  href="#myModal{{$faq->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-faq/'.$faq->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:80%;"rel="{{ $faq->id }}" rel1="delete-faq" href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Delete">Delete</a>
                  </td> 
                </tr>
                <div id="myModal{{$faq->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>{{$faq->id}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Faq ID: </b> {{$faq->id}}</p>
                    <p><b>Question: </b> {{$faq->question}}</p>
                    <p><b>Answer: </b> {{$faq->answer}}</p>
                    <p><b>Creation date: </b> {{$faq->created_at}}</p>
                    <p><b>Status: </b> 
                      @if($faq->status == 0)
                        Inactive
                      @else 
                        Active
                      @endif
                    </p>
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