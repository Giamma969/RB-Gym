@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Shipping charges</a> <a href="#" class="current">Edit shipping charges</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-truck"></i> </span>
            <h5>Edit shipping charges</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-shipping-charges/'.$shippingDetails->id)}}" name="edit_shipping_charges" id="edit_shipping_charges" novalidate="novalidate"> {{csrf_field()}}
              
            <div class="control-group">
                <label class="control-label">Free shipping at (€)</label>
                <div class="controls">
                  <input type="number" min="1" step="0.01" name="free_shipping" id="free_shipping" value="{{$shippingDetails->free_shipping}}" class="price_form">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Standard shipping cost (€)</label>
                <div class="controls">
                  <input type="number" min="1" step="0.01" name="price" id="price" value="{{$shippingDetails->price}}" class="price_form">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Estimate delivery day start</label>
                <div class="controls">
                  <input type="number" min="1"  name="estimate_delivery_start" id="estimate_delivery_start" value="{{$shippingDetails->estimate_delivery_start}}" class="price_form">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Estimate delivery day end</label>
                <div class="controls">
                  <input type="number" min="1"  name="estimate_delivery_end" id="estimate_delivery_end" value="{{$shippingDetails->estimate_delivery_end}}" class="price_form">
                </div>
              </div>

              

              <div class="form-actions">
                <input type="submit" value="Edit shipping charges" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">

  </div>
</div>


@endsection