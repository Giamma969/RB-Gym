@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Shipping charges</a> <a href="#" class="current">View shipping charges</a> </div>
    <h1>Shipping charges</h1>
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
          <div class="widget-title"> <span class="icon"><i class="icon-truck"></i></span>
            <h5>View shipping charges</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Shipping charges ID</th>
                  <th>Free shipping at (€)</th>
                  <th>Shipping cost (€)</th>
                  <th>Estimated shipping days begin</th>
                  <th>Estimated shipping days end</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($shippingCharges as $sh)
                <tr class="gradeX">
                  <td>{{$sh->id}}</td>
                  <td>{{$sh->free_shipping}}</td>
                  <td>{{$sh->price}}</td>
                  <td>{{$sh->estimate_delivery_start}}</td>
                  <td>{{$sh->estimate_delivery_end}}</td>  
                  <td style="max-width:40px;" class="center">
                    <a style="width:80%;"  href="#myModal{{$sh->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View details</a>
                    <a style="width:80%;" href="{{ url('/admin/edit-shipping-charges/'.$sh->id)  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                  </td> 
                </tr>
                <div id="myModal{{$sh->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><b>Shipping charges #{{$sh->id}}</b></h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Shipping charges ID: </b> {{$sh->id}}</p>
                    <p><b>Free shipping at: </b> {{$sh->free_shipping}}€</p>
                    <p><b>Shipping cost: </b> {{$sh->price}}€</p>
                    <p><b>Estimated shipping days start: </b> {{$sh->estimate_delivery_start}}</p>
                    <p><b>Estimated shipping days end: </b> {{$sh->estimate_delivery_end}}</p>
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
