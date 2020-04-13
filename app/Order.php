<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{

    public function orders(){
        return $this->hasMany('App\OrdersProduct','order_id');
    }

    public static function getOrderDetails($order_id){
        $getOrderDetails = Order::where('id',$order_id)->first();
        return $getOrderDetails;
    }
    
    public static function getProductsOrder($order_id){
        $products=DB::table('orders_products')->where('order_id',$order_id)
            ->join('products', 'products.id', '=', 'orders_products.product_id')
            ->select('products.product_code','orders_products.product_quantity')
            ->get();
        return $products;
    }

}

