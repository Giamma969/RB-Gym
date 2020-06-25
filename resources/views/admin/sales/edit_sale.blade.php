@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sales</a> <a href="#" class="current">Edit sale</a> </div>
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
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit sale</h5>
                    </div>
                    <div class="widget-content nopediting">
                        <form class="form-horizontal" method="post" action="{{url('/admin/edit-sale/'.$saleDetails->id)}}" name="edit_sale" id="edit_sale" > {{csrf_field()}}

                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="{{$saleDetails->name}}">
                                </div>
                            </div>
                            
                            
                            <div class="control-group">
                                <label class="control-label">Amount type</label>
                                <div class="controls">
                                    <select name="amount_type" style="width: 220px;">
                                        <option value="fixed" @if($saleDetails->amount_type == "fixed") selected @endif>Fixed</option>
                                        <option value="percentage" @if($saleDetails->amount_type == "percentage") selected @endif>Percentage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Amount</label>
                                <div class="controls">
                                <input type="number" name="amount" min="0" id="amount" value="{{$saleDetails->amount}}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Active</label>
                                <div class="controls">
                                <input type="checkbox" name="status" id="status" value="1" @if($saleDetails->status == "1") checked @endif>
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="submit" value="Edit sale" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection