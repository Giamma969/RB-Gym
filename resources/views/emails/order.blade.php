@php use App\Coupon; @endphp

<html>
    <head>
        <title>Confirm Order</title>
    </head>
    <body>
        <table>
            <tr><td>&nbsp;</td></tr>
            <tr><td> <!-- logo qui --></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Hello {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks for choosing us. Your order details are below :</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Order #{{ $order_id }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table width="95%" cell-padding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>Product name</td>
                        <td>Product code</td>
                        <td>Color</td>
                        <td>Quantity</td>
                        <td>Unit price</td>
                    </tr>
                    @foreach($productDetails as $product)
                        <tr>
                            <td>{{ $product->product_name}}</td>
                            <td>{{ $product->product_code}}</td>
                            <td>{{ $product->product_color}}</td>
                            <td>{{ $product->product_quantity}}</td>
                            <td>{{ $product->product_price}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">Shipping charges:</td>
                        <td> {{$orderDetails->shipping_charges}}</td>
                    </tr>

                    @if($orderDetails->coupon_id != NULL)
                    <tr>
                        <td colspan="5" align="right">Coupon discount:</td>
                        <td>€ {{$couponDetails->amount}}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="5" align="right">Total:</td>
                        <td> {{$orderDetails->grand_total}}</td>
                    </tr>
                </table>
            </tr></td>
            <tr><td>
                <table width="100%">
                    <tr>
                        <td width="50%"> 
                            <table>
                                <tr>
                                    <td><strong>Bill to:</strong></td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['user_name']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['user_surname']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['address']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['country']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['province']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['city']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['pincode']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $billingDetails['mobile']}}</td>
                                </tr>
                            </table>
                        </td>
                        <td width="50%"> 
                            <table>
                                <tr>
                                    <td><strong>Ship to:</strong></td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['user_name']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['user_surname']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['address']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['country']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['province']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['city']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['pincode']}}</td>
                                </tr>
                                <tr>
                                    <td>{{ $shippingDetails['mobile']}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </tr></td>
            <tr><td>&nbsp;</td></tr>
            @if(!empty($cmsDetails->email))
                <tr><td>For any enquiries, you can cantact us at <a href="mailto:info@rb-gym.com">{{$cmsDetails->email}}</a></td></tr>
            @endif
            <tr><td>&nbsp;</td></tr>
            <tr><td>Regard,<br>RB-Gym Team</td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>
</html>