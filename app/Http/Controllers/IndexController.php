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

        //ordine decrescente
        $productsAll = Product::orderBy('id','DESC')->get();
        
        //ordine casuale
        $productsAll=Product::inRandomOrder()->where('status',1)->paginate(6);//get();

        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
       /* $categories= json_decode(json_encode($categories));
        echo"<pre>";print_r($categories);die;*/
        $categories_menu="";
        foreach($categories as $cat){
           $categories_menu .=" 
                <div class='panel-heading'>
                    <h4 class='panel-title'>
                        <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
                            <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                ".$cat->name."
                        </a>
                    </h4>
                </div>
                <div id='".$cat->id."' class='panel-collapse collapse'>
                    <div class='panel-body'>
                        <ul>";
                        $sub_categories= Category::where(['parent_id'=>$cat->id])->get();
                        foreach($sub_categories as $subcat){
                            $categories_menu .=" <li><a href='".$subcat->url."'>".$subcat->name." </a></li>";
                        }
                            
                            $categories_menu .="
                        </ul>
                    </div>
                </div>";
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
        

        $banners = Banner::where('status','1')->get(); 

        return view('index')->with(compact('productsAll','categories_menu','categories','banners'));
    }
    
}
