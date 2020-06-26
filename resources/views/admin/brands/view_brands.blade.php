@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">View brands</a> </div>
    <h1>Brands</h1>
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
            <h5>View brands</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Logo</th>
                  <th>Creation date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($brands as $brand)
                <tr class="gradeX">
                    <td>{{$brand->name}}</td>
                    <td> <div style="overflow:auto; max-height:100px!important; max-width:100ch;">{{$brand->description}}</div></td>
                    <td>
                        @if(!empty($brand->logo))
                            <img src="{{asset('/images/backend_images/brands/small/'.$brand->logo)}}" style="width:80px;">
                        @endif
                    </td>
                    <td>{{$brand->created_at}}</td>
                  <td style="max-width:40px;" class="center">
                    <a style="width:90%;"  href="#myModal{{$brand->name}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:90%;" href="{{ url('/admin/edit-brand/'.$brand->name)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:90%;" rel="{{ $brand->name }}" rel1="delete-brand"  href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td> 
                </tr>
                <div id="myModal{{$brand->name}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>{{$brand->name}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Name: </b> {{$brand->name}}</p>
                    <p><b>Description: </b> {{$brand->description}}</p>
                    <p><b>Creation date: </b> {{$brand->created_at}}</p>
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