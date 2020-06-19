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

        //***************SLIDER 1*********************
        //get cardio products if status==1
        $slider2 = Category::where(['id'=>"9"])->first();
        if($slider2->status == "0"){
            $slider2 = DB::table('categories')->where(['parent_id'=>0, 'status'=>1])->first();
        }
        $category_name2 = $slider2->name;
        $sub_categories= Category::where(['parent_id'=>$slider2->id])->get();
        foreach($sub_categories as $subcat){
            $cat_ids2[] = $subcat->id;
        }
        
        $products_slider2= DB::table('products')
            ->whereIn('category_id',$cat_ids2)
            ->where('products.status',1)
            ->join('categories','categories.id','=','products.category_id')
            ->select('products.*','categories.name as category_name')
            ->get();
            //->orderBy('id','Desc');
        
        // echo'<pre>'; print_r($productsCardio); die;


        //***************SLIDER 2*********************
        //get "Strength" products if status==1
        $slider3 = Category::where(['id'=>"13"])->first();
        if($slider3->status == "0"){
            $slider3 = DB::table('categories')->where(['parent_id'=>0, 'status'=>1])->first();
        }
        $category_name3 = $slider3->name;
        $sub_categories= Category::where(['parent_id'=>$slider3->id])->get();
        foreach($sub_categories as $subcat){
            $cat_ids3[] = $subcat->id;
        }
        
        $products_slider3= DB::table('products')
            ->whereIn('category_id',$cat_ids3)
            ->where('products.status',1)
            ->join('categories','categories.id','=','products.category_id')
            ->select('products.*','categories.name as category_name')
            ->get();
       

        
        $categories= Category::with('categories')->where(['parent_id'=>0,'status'=>1])->get();
       
        

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
        $banners = Banner::where('status','1')->get(); 

        return view('index')->with(compact('productsAll','categories','banners','products_slider2','category_name2','products_slider3','category_name3','userCart'));
    }
    
}
