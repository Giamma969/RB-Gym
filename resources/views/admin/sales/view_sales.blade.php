@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sales</a> <a href="#" class="current">View sales</a> </div>
    <h1>Sales</h1>
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
            <h5>View sales</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sale ID</th>
                  <th>Name</th>
                  <th>Amount type</th>
                  <th>Amount</th>
                  <th>Creation date</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($sales as $sale)
                <tr class="gradeX">
                  <td>{{$sale->id}}</td>
                  <td>{{$sale->name}}</td>
                  <td>{{$sale->amount_type}}</td>
                  <td>{{$sale->amount}}</td>
                  <td>{{$sale->created_at}}</td>
                  <td>
                    @if($sale->status == 0)
                        <span style="color:red">Inactive</span>
                    @else 
                        <span style="color:green">Active</span>
                    @endif
                  </td>
                  <td style="max-width:40px;" class="center">
                    <a style="width:80%;"  href="#myModal{{$sale->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-sale/'.$sale->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-products-sale/'.$sale->id)  }} " class="btn btn-success btn-mini" title="Products">Products</a>
                    <a style="width:80%;"rel="{{ $sale->id }}" rel1="delete-sale" href="javascript:"  class="btn btn-danger btn-mini deleteRecord" title="Delete">Delete</a>
                  </td> 
                </tr>
                <div id="myModal{{$sale->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>{{$sale->name}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Sale ID: </b> {{$sale->id}}</p>
                    <p><b>Name: </b> {{$sale->name}}</p>
                    <p><b>Amount type: </b> {{$sale->amount_type}}</p>
                    <p><b>Amount: </b> {{$sale->amount}}</p>
                    <p><b>Creation date: </b> {{$sale->created_at}}</p> 
                    <p><b>Status: </b> @if($sale->status == 0) Inactive @else Active @endif </p>
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