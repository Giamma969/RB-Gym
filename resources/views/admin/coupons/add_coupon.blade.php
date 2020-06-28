@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Coupons</a> <a href="#" class="current">Add coupon</a> </div>
    <h1>Coupons</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-gift"></i> </span>
            <h5>Add coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-coupon')}}" name="add_coupon" id="add_coupon" > {{csrf_field()}}

              <div class="control-group">
                <label class="control-label">Coupon code</label>
                <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" minlength="16" maxlength="16" readonly>
                  <input type="button" name="makeCouponCode" id="makeCouponCode" class="btn btn-success" value="Generate">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Amount</label>
                <div class="controls">
                  <input class="expiry_date" type="number" name="amount" min="0" id="amount" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Expiry date</label>
                <div class="controls">
                  <input  class="expiry_date" type="text" name="expiry_date" id="expiry_date" autocomplete="off" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Active</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add coupon" class="btn btn-success">
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