<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;
use Session;
use DB;
use Auth;

class IndexController extends Controller
{
    public function index(){

        //ordine crescente(default)
        $productsAll=Product::get();

        $homepage = DB::table('homepages')->where('id',1)->first();
        $first_grid = DB::table('categories')->where('id',$homepage->first_grid)->first();
        $second_grid = DB::table('categories')->where('id',$homepage->second_grid)->first();
        $third_grid = DB::table('categories')->where('id',$homepage->third_grid)->first();
        

        //FIRST SLIDER
        $first_slider=DB::table('categories')->where('id',$homepage->first_slider)->first();
        if($first_slider->parent_id == 0){
            //if the URL is the URL of the main category
            $subCategories= Category::where(['parent_id'=>$first_slider->id])->get();
            foreach($subCategories as $subcat){
                $cat_ids1[] = $subcat->id;
            }
            
            $products_first_slider= DB::table('products')->whereIn('products.category_id',$cat_ids1)->where('products.status',1)
                ->join('categories','categories.id','=','products.category_id')
                ->select('products.*','categories.name as category_name')->get();
        }else{
            $products_first_slider = DB::table('products')->where(['products.category_id'=>$first_slider->id])
                ->where('products.status',1)->join('categories','categories.id','=','products.category_id')
                ->select('products.*','categories.name as category_name')->get();
        }
        //if product is in sale add new field "new_price"
        foreach($products_first_slider as $product){
            if($product->in_sale == 1){
                $new_price = DB::table('products_sales')->where('product_id',$product->id)->first();
                $new_price = $new_price->price;
                $product->new_price = $new_price;
            }
        }
        
        //SECOND SLIDER
        $second_slider=DB::table('categories')->where('id',$homepage->second_slider)->first();
        if($second_slider->parent_id == 0){
            //if the URL is the URL of the main category
            $subCategories= Category::where(['parent_id'=>$second_slider->id])->get();
            foreach($subCategories as $subcat){
                $cat_ids2[] = $subcat->id;
            }
            
            $products_second_slider= DB::table('products')->whereIn('products.category_id',$cat_ids2)->where('products.status',1)
                ->join('categories','categories.id','=','products.category_id')
                ->select('products.*','categories.name as category_name')->get();
        }else{
            $products_second_slider = DB::table('products')->where(['products.category_id'=>$second_slider->id])
                ->where('products.status',1)->join('categories','categories.id','=','products.category_id')
                ->select('products.*','categories.name as category_name')->get();
        }
        //if product is in sale add new field "new_price"
        foreach($products_second_slider as $product){
            if($product->in_sale == 1){
                $new_price = DB::table('products_sales')->where('product_id',$product->id)->first();
                $new_price = $new_price->price;
                $product->new_price = $new_price;
            }
        }

       
        //assign session_in for first time entering on website
        if(empty(Session::get('session_id'))){
            $new_session=str_random(40);
            Session::put('session_id',$new_session);
        }
        $session_id=Session::get('session_id');
        $user_id=NULL;
        //create empty cart if not exists --> NO login
        $countCart=DB::table('cart')->where(['session_id'=>$session_id])->count();
        if($countCart==0 && !Auth::check()){
            DB::table('cart')->insert([
                'user_id'=> $user_id,
                'session_id'=> $session_id
            ]);
        }
        
        //create empty wishlist if not exists --> NO login
        $countWish=DB::table('wishlists')->where(['session_id'=>$session_id])->count();
        if($countWish ==0 && !Auth::check()){
            DB::table('wishlists')->insert([
                'user_id'=> $user_id,
                'session_id'=> $session_id
            ]);
        }
        
        $userCart = \App\Cart::getProductsCart();
        $categories= Category::with('categories')->where(['parent_id'=>0,'status'=>1])->get();
        $banners = DB::table('banners')->where('status',1)->get();
        $brands = DB::table('brands')->where('logo','<>', NULL)->get();
        $cmsDetails = DB::table('cms')->where('id',1)->first();
        $shippingDetails = DB::table('shipping_charges')->where('id',1)->first();

        return view('index')->with(compact('productsAll','categories','banners','userCart','homepage','first_grid','second_grid','third_grid','first_slider','second_slider','products_first_slider','products_second_slider','banners','brands','cmsDetails','shippingDetails'));
    }
    
}
