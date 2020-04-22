@extends('layouts.adminLayout.admin_design')
@section('content')
@php use App\Coupon;@endphp



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>Order #{{ $orderDetails->id }}</h1>

    @if(Session::has('flash_message_error'))
    <div class="alert alert-success alert-block">
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
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Order details</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">  
                        <tbody>
                            <tr>
                                <td class="taskDesc"> Order date</td>
                                <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc"> Order status</td>
                                <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc"> Total payd</td>
                                <td class="taskStatus">€ {{ $orderDetails->grand_total }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc"> Shipping charges</td>
                                <td class="taskStatus">€ {{ $orderDetails->shipping_charges }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc"> Coupon code</td>
                                @if($orderDetails->coupon_id == NULL)
                                    <td class="taskStatus">-</td>
                                @else
                                    <td class="taskStatus">{{ $couponDetails->coupon_code }}</td> 
                                @endif
                            </tr>
                            <tr>
                                <td class="taskDesc">Coupon discount</td>
                                @if($orderDetails->coupon_id != NULL)
                                    <td class="taskStatus">€ {{ $couponDetails->amount }}</td>
                                @else
                                    <td class="taskStatus">-</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="taskDesc">Payment method</td>
                                <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Billing address</h5>
                </div>
                <div class="widget-content">
                    {{ $billingDetails->user_name }} <br>
                    {{ $billingDetails->user_surname }} <br>
                    {{ $billingDetails->address }} <br>
                    {{ $billingDetails->country }} <br>
                    {{ $billingDetails->province }} <br>
                    {{ $billingDetails->city }} <br>
                    {{ $billingDetails->pincode }} <br>
                    {{ $billingDetails->mobile }} <br>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Customer details</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">  
                        <tbody>
                            <tr>
                                <td class="taskDesc">Customer ID</td>
                                <td class="taskStatus">{{ $user_id }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Customer email</td>
                                <td class="taskStatus">{{ $user_email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Update order status</h5>
                </div>
                <div class="widget-content">
                    <form action="{{ url('admin/update-order-status')}}" method="post">{{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
                        <table width="100%">
                            <tr>
                                <td>
                                    <select name="order_status" id="order_status" class="control-label" required>
                                        <option value="New" @if($orderDetails->order_status == "New") selected @endif > New </option>
                                        <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif> Pending </option>
                                        <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif> Cancelled </option>
                                        <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif> In Process </option>
                                        <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif> Shipped </option>
                                        <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif> Delivered </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Update status">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                    <h5>Shipping address</h5>
                </div>
                <div class="widget-content">
                    {{ $shippingDetails->user_name }} <br>
                    {{ $shippingDetails->user_surname }} <br>
                    {{ $shippingDetails->address }} <br>
                    {{ $shippingDetails->country }} <br>
                    {{ $shippingDetails->province }} <br>
                    {{ $shippingDetails->city }} <br>
                    {{ $shippingDetails->pincode }} <br>
                    {{ $shippingDetails->mobile }} <br>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Product code</th>
                    <th>Product name</th>
                    <th>Product brand</th>
                    <th>Product color</th>
                    <th>Product price</th>
                    <th>Product quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productsOrder as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->product_color }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->product_quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection