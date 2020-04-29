@php use App\Product; @endphp
@extends ('layouts.frontLayout.front_design')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Your orders</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
@if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
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
<section class="checkout-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                @include('layouts.frontLayout.front_sidebar')
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="heading" align="center">
                    @foreach($orders as $order)
                        <?php
                        $timestamp =$order->created_at; 
                        $timestamp = new DateTime($timestamp); 
                        $date = $timestamp->format('d-m-Y');
                        $time = $timestamp->format('H:i');
                        $coupon =Product::getOrderCoupon($order->coupon_id);
                        ?>
                        
                        <table class="table_user_orders">
                            <tbody>
                                <tr>
                                    <td class="th_user_orders">Order date</td>
                                    <td class="th_user_orders">Ordered number</td>
                                    <td class="th_user_orders"></td>
                                    <td class="th_user_orders">Status</td>
                                    
                                </tr>
                                <tr>
                                    <td class="th_user_orders">{{$date}}</td>
                                    <td class="th_user_orders">{{ $order->id }}</td>
                                    <td class="th_user_orders"></td>
                                    <td class="th_user_orders">{{ $order->order_status }}</td>
                                        
                                    
                                    
                                    <!-- <td>{{ $order->order_status }}</td>
                                    <td><a href="{{ url('/orders/'.$order->id) }}">View details</a></td> -->
                                </tr>
                                <tr>
                                    <td colspan="4"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><br></td>
                                </tr>
                                @foreach($order->orders as $product)
                                    @php 
                                        $product_name =Product::getProductName($product->product_id);
                                        $product_image =Product::getProductImage($product->product_id);
                                        $product_price =Product::getProductPrice($product->product_id); 

                                    @endphp    
                                    <tr>
                                        <td style="width:20ch;">
                                            <a href="{{ url('product/'.$product->product_id) }}">
                                                <img src="{{asset('images/backend_images/products/small/'.$product_image)}}" width="150px;" alt="">
                                            </a>
                                        </td>
                                        <td>
                                        {{ $product->product_quantity }} x <a href="{{ url('product/'.$product->product_id) }}" style="font-size:15px;">{{ $product_name }}</a> (€{{$product_price}} each)
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="th_user_orders"> </td>
                                    <td class="th_user_orders"> </td>
                                    <td class="th_user_orders">Coupon doscount</td>
                                    <td class="th_user_orders">Total</td>
                                    
                                </tr>
                                <tr>
                                    <td class="th_user_orders"> </td>
                                    <td class="th_user_orders"> </td>
                                    <td class="th_user_orders">@if($coupon !== NULL) €{{$coupon}} @else €0 @endif</td>
                                    <td class="th_user_orders">€{{ $order->grand_total }}</td>
                                </tr>
                                

                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
