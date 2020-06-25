@extends('layouts.adminlayout.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sales</a> <a href="#" class="current">Edit products sale</a> </div>
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
                    <div class="widget-title" style="border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                        <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit products sale</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-products-sale/'.$saleDetails->id) }}" name="edit_products_sale" id="edit_products_sale" novalidate="novalidate"> {{csrf_field()}}
                        
                            <input type="hidden" name="sale_id" value="{{$saleDetails->id}}">
                            <div class="control-group">
                                <label class="control-label">Name:</label>
                                <label class="control-label"><strong>{{ $saleDetails->name }} </strong></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Amount type:</label>
                                <label class="control-label"><strong>@if($saleDetails->amount_type == "percentage") Percentage @else Fixed @endif</strong></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Amount:</label>
                                <label class="control-label"><strong>{{ $saleDetails->amount }} </strong></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Status:</label>
                                <label class="control-label"><strong>@if($saleDetails->status == 0) Inactive @else Active @endif </strong></label>
                            </div>

                                                     
                            
                            
                            <!-- Products permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Select the products to be discounted by id</h5>
                            </div>
                            

                            

                            @foreach($products as $product)
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">{{$product->id}}</label>
                                    <div class="controls">
                                        <input type="checkbox" name="{{$product->id}}"  value="{{$product->id}}" @if(in_array($product->id, $array, true)) checked @endif>
                                    </div>
                                </div>
                            @endforeach

                               

                            <div class="form-actions" style="clear:left;">
                                <input type="submit" value="Edit products sale" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
