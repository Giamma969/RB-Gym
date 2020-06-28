@php use App\Product; @endphp
@extends ('layouts.frontLayout.front_design')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <span>Your orders</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb Section Begin -->
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
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        @foreach($orders as $order)
                            <div class="cart-table" style="border:1px solid #ebebeb; margin-bottom:250px;">
                                <?php
                                    $timestamp =$order->created_at; 
                                    $timestamp = new DateTime($timestamp); 
                                    $date = $timestamp->format('d-m-Y');
                                    $time = $timestamp->format('H:i');
                                    $coupon =Product::getOrderCoupon($order->coupon_id);
                                ?>
                                <table style="border: 0px!important;">
                                    <thead>
                                        <tr>
                                            <th>#Order<br><p>{{$order->id}}</p></th>
                                            <th class="p-name">Order confirmed on<br><p>{{$date}}</p></th>
                                            <th>Order status<br><p>{{ $order->order_status }}</p></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <!-- <tr>
                                        </tr> -->
                                    </thead>
                                    <tbody>
                                        @foreach($order->orders as $product)
                                            <tr><form id="myform_id" action="{{ url('/product-ordered' )}}" method="post" >{{ csrf_field() }}
                                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                                <td class="cart-pic first-row">
                                                    
                                                    <a  href="javascript:$('#myform_id').submit();">
                                                        <img src="{{asset('images/backend_images/products/small/'.$product->product_image)}}" alt="" width="100px;">
                                                    </a>
                                                </td>
                                                <td class="cart-title first-row">
                                                    <a  href="javascript:$('#myform_id').submit();">
                                                        <h5>{{$product->product_name}}</h5>
                                                    </a>
                                                    <p>Code: {{ $product->product_code }}</p>
                                                </td>
                                                </form>
                                                <td class="p-price first-row">
                                                   €{{$product->product_price}}
                                                </td>
                                                <td class="qua-col first-row">
                                                    <div class="quantity">
                                                        <p style="margin-bottom:0px !important;">x {{ $product->product_quantity }}</p>
                                                    </div>
                                                </td>
                                                @php $_product = $product->product_quantity * $product->product_price; @endphp
                                                <td class="total-price first-row">€{{$_product}}</td>                                 
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4 offset-lg-4">
                                        <div class="proceed-checkout">
                                            <ul>
                                                @php $subtot = $order->grand_total + $product->coupon_amount - $order->shipping_charges;   @endphp
                                                <li class="subtotal">Subtotal <span> €{{$subtot}}</span></li>
                                                <li class="subtotal">Discount <span>
                                                    @if($product->coupon_amount != 0) €{{$product->coupon_amount}} @else €0 @endif</span></li>
                                                <li class="subtotal">Shipping Cost <span>€{{$order->shipping_charges}}</span></li>
                                                <li class="cart-total">Total <span>€{{ $order->grand_total }}</span></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    
                                    
                                </ul>
                                <a href="{{ url('checkout') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection