@extends ('layouts.frontLayout.front_design')
@section('content')

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


<section id="cart_items" style="margin-top:20px;">
    <div class="container">
        <div> 
            <ol class="breadcrumb">
                <li><a style="color:#333 !important;" href="/">Home</a></li>
                <li><a style="color:#333 !important;" href="{{ url('orders')}}">Orders</a></li>
                <li><a style="color:#333 !important;" href="{{ url('/orders/'.$orderDetails->id) }}">Order #{{ $orderDetails->id }}</a></li>
            </ol>
        </div>
    </div>
</section> 

<section id="do_action">
    <div class="container">
        <div class="heading" align="center" >
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Product code</th>
                        <th>Product name</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
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
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
