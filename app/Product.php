<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;

class Product extends Model
{
   
    public static function cartCount(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cartDetails=DB::table('cart')->where(['user_id'=>$user_id])->first();
        }else{
            $session_id= Session::get('session_id');
            $cartDetails=DB::table('cart')->where(['session_id'=>$session_id])->first();
        }
        $cart_id=$cartDetails->id;
        $cartCount = DB::table('products_carts')->where(['cart_id'=>$cart_id])->count();
        return $cartCount;
    }

    public static function productSubcatCount($cat_id){
        $subcatCount = Product::where(['category_id'=>$cat_id, 'status'=>1])->count();
        return $subcatCount;
    }

    public static function productAllCount(){
        $allProducts = Product::where(['status'=>1])->count();
        return $allProducts;
    }

    public static function countSearchProducts($search){
        $count_search_products = Product::where(function($query) use($search){
            $query->where('product_name','like','%'.$search.'%')
                    ->orWhere('product_code','like','%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%')
                    ->orWhere('product_color','like','%'.$search.'%')
                    ->orWhere('brand','like','%'.$search.'%');
        })->where('status',1)->count();
        return $count_search_products;
    }

    public static function checkIfWished($product_id){
        $session_id = Session::get('session_id');
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $wishDetails=DB::table('wishlists')->where(['user_id'=>$user_id])->first();
        }else{
            $user_id = NULL;
            $wishDetails=DB::table('wishlists')->where(['session_id'=>$session_id])->first();
        }
        //check if product is already in wishlist
        $wish_id=$wishDetails->id;
        $product_count=DB::table('wish_products')->where(['wish_id'=>$wish_id,'product_id'=>$product_id])->count();
        if($product_count > 0)
            return true;

        return false;
    }

    public static function checkIfNotWished($product_id){
        $session_id = Session::get('session_id');
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $wishDetails=DB::table('wishlists')->where(['user_id'=>$user_id])->first();
        }else{
            $user_id = NULL;
            $wishDetails=DB::table('wishlists')->where(['session_id'=>$session_id])->first();
        }
        //check if product is not already in wishlist
        $wish_id=$wishDetails->id;
        $product_count=DB::table('wish_products')->where(['wish_id'=>$wish_id,'product_id'=>$product_id])->count();
        if($product_count == 0)
            return true;

        return false;
    }

    public static function countWishedProducts(){
        $session_id = Session::get('session_id');
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $wishDetails=DB::table('wishlists')->where(['user_id'=>$user_id])->first();
        }else{
            $user_id = NULL;
            $wishDetails=DB::table('wishlists')->where(['session_id'=>$session_id])->first();
        }
        $wish_id=$wishDetails->id;
        $product_count=DB::table('wish_products')->where(['wish_id'=>$wish_id])->count();

        return $product_count;
    }

    public static function hasReview($product_id){
        $count = DB::table('reviews')->where('product_id',$product_id)->count();
        if($count > 0)
            return true;
        return false;
    }

    public static function getReviewsDetails($product_id){
        $reviewDetails = DB::table('reviews')->where('product_id',$product_id)
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*','users.name','users.surname')
            ->get();
       // echo $reviewDetails; die;
        return $reviewDetails;
    }

    public static function countReviews($product_id){
        $countReviews = DB::table('reviews')
            ->where('product_id', $product_id)
            ->count();
        return $countReviews;
    }  
    public static function  createCartIfNotExists(){
        if(empty(Session::get('session_id'))){
            $new_session=str_random(40);
            Session::put('session_id',$new_session);
        }
        //create empty cart if not exists --> NO login
        $session_id = Session::get('session_id');
        $countCart=DB::table('cart')->where(['session_id'=>$session_id])->count();
        if($countCart==0 && !Auth::check()){
            DB::table('cart')->insert([
                'user_id'=> NULL,
                'session_id'=> $session_id
            ]);
        } 
    }

    public static function createWishlistIfNotExists(){
        if(empty(Session::get('session_id'))){
            $new_session=str_random(40);
            Session::put('session_id',$new_session);
        }
        //create empty wishlist if not exists --> NO login
        $session_id = Session::get('session_id');
        $countWish=DB::table('wishlists')->where(['session_id'=>$session_id])->count();
        if($countWish ==0 && !Auth::check()){
            DB::table('wishlists')->insert([
                'user_id'=> NULL,
                'session_id'=> $session_id
            ]);
        }
    }

    public static function updateStock($cart_id){
        $productsCart = DB::table('products_carts')->where('cart_id',$cart_id)->get();
        foreach($productsCart as $product){
            $get_stock = DB::table('products')->where('id', $product->product_id)->first();
            $get_stock=$get_stock->stock;
            $quantity = $product->product_quantity;
            $new_stock = $get_stock - $quantity;
            if($new_stock < 0){
                $new_stock = 0;
            }
            DB::table('products')->where('id', $product->product_id)->update(['stock'=>$new_stock]);
        }
    }

    public static function getProductName($id){
        if(DB::table('products')->where('id',$id)->exists()){
            $productDetails = DB::table('products')->where('id',$id)->first();
            $product_name = $productDetails->product_name;
        }else{
            $product_name = "";
        }
        return $product_name;
    }

    public static function getProductImage($id){
        if(DB::table('products')->where('id',$id)->exists()){
            $productDetails = DB::table('products')->where('id',$id)->first();
            $product_image = $productDetails->image;
        }else{
            $product_image = "";
        }
        return $product_image;
    }

    public static function getProductPrice($id){
        if(DB::table('products')->where('id',$id)->exists()){
            $productDetails = DB::table('products')->where('id',$id)->first();
            $product_price = $productDetails->price;
        }else{
            $product_price = "";
        }
        return $product_price;
    }

    public static function getOrderCoupon($coupon_id){
        $coupon = NULL;
        if($coupon_id !== NULL){
            $coupon = DB::table('coupons')->where('id',$coupon_id)->first();
            $coupon=$coupon->amount;
        }
        return $coupon;
    }
}
