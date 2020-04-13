@extends ('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items" style="margin-top:20px;">
    <div class="container">
        <div>
            <ol class="breadcrumb">
                <li><a style="color:#333 !important;" href="/">Home</a></li>
                <li><a style="color:#333 !important;" href="orders">Orders</a></li>
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
                <th>#Order</th>
                <th>Ordered products</th>
                <th>Payment method</th>
                <th>Grand total</th>
                <th>Created on</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    @foreach($order->orders as $product)
                        {{ $product->product_code }} ({{ $product->product_quantity }}) <br>
                    @endforeach
                </td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->grand_total }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ url('/orders/'.$order->id) }}">View details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</section>

@endsection
