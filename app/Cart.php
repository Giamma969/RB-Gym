<?php

namespace App;
use DB;
use Auth;
use Session;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static function getProductsCart(){
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $cartDetails=DB::table('cart')->where(['user_id'=>$user_id])->first();
            $session_id = Session::get('session_id');
        }else{
            $user_id = NULL;
            $session_id = Session::get('session_id');
            //if user not logged haven't a cart create it
            //echo $session_id; die;
            $cartCount=DB::table('cart')->where(['session_id'=> $session_id])->count();
            // echo $session_id; die;
            if($cartCount == 0){
                DB::table('cart')->insert([
                    'user_id'=> $user_id,
                    'session_id'=> $session_id,
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()')
                ]);
            }
            $cartDetails=DB::table('cart')->where(['session_id'=> $session_id])->first();
        }
       
        $cart_id=$cartDetails->id;
        $userCart = DB::table('products_carts')->where(['cart_id'=>$cart_id])
            ->join('products', 'products.id', '=', 'products_carts.product_id')
            ->select('products.*','products_carts.cart_id','products_carts.product_quantity')
            ->get();

        return $userCart;
    }
}
