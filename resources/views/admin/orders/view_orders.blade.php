@extends('layouts.adminLayout.admin_design')
@section('content')
@php
    use App\Order;
@endphp

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Ordini</a>
            <a href="#" class="current">Visualizza ordini</a> 
        </div>

        <h1>Ordini</h1>
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
                        <h5>Visualizza ordini</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order date</th>
                                    <th>Customer ID</th>
                                    <th>Customer name</th>
                                    <th>Customer surname</th>
                                    <th>Ordered products</th>
                                    <th>Total payd</th>
                                    <th>Order status</th>
                                    <th>Payment method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usersOrders as $order)
                                    <tr class="gradeX">
                                        <td class="center">{{$order->id}}</td>
                                        <td class="center">{{$order->created_at}}</td>
                                        <td class="center">{{$order->user_id}}</td>
                                        <td class="center">{{$order->name}}</td>
                                        <td class="center">{{$order->surname}}</td>
                                        <td class="center">
                                            @php $products=Order::getProductsOrder($order->id); @endphp
                                            @foreach($products as $pro)
                                                {{ $pro->product_code }} ({{ $pro->product_quantity }})<br>
                                            @endforeach 
                                        </td>
                                        <td class="center">{{$order->grand_total}}</td>
                                        <td class="center">{{$order->order_status}}</td>
                                        <td class="center">{{$order->payment_method}}</td>
                                        <td style="max-width:50px;" class="center">
                                            <a style="width:80%;"  href="#myModal{{$order->id}}" data-toggle="modal" class="btn btn-success btn-mini" title="View">View</a>
                                            <a style="max-width:80%;" target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-primary btn-mini" title="View">View order details</a>
                                        </td> 
                                    </tr>
                                    <div id="myModal{{$order->id}}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3><b>Order #{{$order->id}}</b></h3>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>Order ID: </b> {{$order->id}}</p>
                                            <p><b>Order date: </b> {{$order->created_at}}</p>
                                            <p><b>Customer name: </b> {{$order->name}}</p>
                                            <p><b>Customer surname: </b> {{$order->surname}}</p>
                                            <p><b>Ordered products: </b>
                                                <ul> 
                                                    @foreach($products as $pro)
                                                        <li>{{ $pro->product_code }} ({{ $pro->product_quantity }})</li>
                                                    @endforeach
                                                </ul>
                                            </p>
                                            <p><b>Total payd: </b> {{$order->grand_total}}</p>
                                            <p><b>Order status: </b> {{$order->order_status}}</p>
                                            <p><b>Payment method: </b> {{$order->payment_method}}</p>
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