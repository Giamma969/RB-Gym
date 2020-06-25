<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
    public function viewSales(){
        $sales = DB::table('sales')->get();
        return view('admin.sales.view_sales')->with(compact('sales'));
    }

    public function addSale(Request $request){
        
        if($request->isMethod('post')){
            $data=$request->all();

            if(empty($data['name']) || empty($data['amount_type']) || empty($data['amount']) ){
                return redirect()->back()->with("flash_message_error","Please fill all fields!");
            }
            
            if(empty($data['status'])){ $status = 0; }else{ $status = 1; }
        
            DB::table('sales')->insert([
                'name' => $data['name'],
                'amount_type' => $data['amount_type'],
                'amount' => $data['amount'],
                'status' =>$status
            ]);
            return redirect()->back()->with('flash_message_success','Sale successfully added!'); 
        }

        return view('admin.sales.add_sale');

    }

    public function editSale(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo'<pre>'; print_r($data); die;

            if(empty($data['name']) || empty($data['amount_type']) || empty($data['amount']) ){
                return redirect()->back()->with("flash_message_error","Please fill all fields!");
            }
            
            if(empty($data['status'])){ $status = 0; }else{ $status = 1; }
            
            DB::table('sales')->where('id',$id)->update([
                'name' => $data['name'],
                'amount_type' => $data['amount_type'],
                'amount' => $data['amount'],
                'status' =>$status
            ]);
            $products_sale = DB::table('products_sales')->where('sale_id',$id)->get();
            foreach($products_sale as $product){
                if($status == 1){
                    DB::table('products')->where('id',$product->product_id)->update([
                        'in_sale' => 1
                    ]); 
                }else{
                    DB::table('products')->where('id',$product->product_id)->update([
                        'in_sale' => 0
                    ]); 
                }
            }

            return redirect()->back()->with('flash_message_success','Sale successfully modified!');
        }       
        $saleDetails = DB::table('sales')->where('id',$id)->first();
        return view('admin.sales.edit_sale')->with(compact('saleDetails'));
    }

    public function editProductsSale(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            
            //elements: array with only products_id for this sale
            $elements = array();
            $count = 0;
            foreach($data as $elem){
                if($count >= 2){
                    array_push($elements, $elem);
                }
                $count++;
            }
            $saleDetails = DB::table('sales')->where('id',$id)->first();   
            $products_sale = DB::table('products_sales')->where('sale_id',$id)->select('products_sales.product_id')->get();
            
            foreach($products_sale as $pro){
                //if the product is not in elements I delete it
                $product_id=$pro->product_id;
                if(!in_array($product_id, $elements, true)){
                    DB::table('products_sales')->where(['sale_id'=> $id, 'product_id'=>$product_id])->delete();
                }
                DB::table('products')->where('id',$product_id)->update([
                    'in_sale' => 0
                ]);    
            }
            
            foreach($elements as $pro){
                //if the product is not in products_sale and in no other salt I add it
                $count_elem1 = DB::table('products_sales')->where(['product_id'=>$pro])->where('sale_id','<>', $id)->count();
                $count_elem2 = DB::table('products_sales')->where(['product_id'=>$pro])->where('sale_id','=', $id)->count();
                if($count_elem1 > 0){
                    return redirect()->back()->with('flash_message_error','The operation was not successful, the product '.$elem.' is already discounted');
                }

                if($count_elem2 == 0){
                    //check and computes the new price
                    $product = DB::table('products')->where('id',$pro)->first();
                    $product_id = $product->id;
                    $old_price = $product->price;

                    if($saleDetails->amount_type == "fixed"){
                        $new_price = $old_price - $saleDetails->amount;
                        if($new_price <= 0)
                            return redirect()->back()->with('flash_message_error','The operation was not successful, the price of the product '.$pro.' is less than 0.');
                        round($new_price, 2);
                    }
                    if($saleDetails->amount_type == "percentage"){
                        $new_price = $old_price - ($old_price * $saleDetails->amount / 100);
                        round($new_price, 2);
                    }

                    DB::table('products_sales')->insert([
                        'sale_id' => $id,
                        'product_id' => $pro,
                        'price' => $new_price
                    ]); 
                    if(DB::table('sales')->where(['id'=>$id, 'status'=>1])->exists()){
                        DB::table('products')->where('id',$product_id)->update([
                            'in_sale' => 1
                        ]); 
                    }
                }
                
            }            
            return redirect()->back()->with('flash_message_success','Operation successfully performed!');

        }
        $products = DB::table('products')->get();
        $saleDetails = DB::table('sales')->where('id',$id)->first();
        $products_sale = DB::table('products_sales')->where('sale_id',$id)->get();
       
        $array = array();
        foreach($products_sale as $item){
            array_push($array, $item->product_id);
        }
        return view('admin.sales.edit_products_sale')->with(compact('saleDetails','products','products_sale','array'));
    }

    public function deleteSale($id=null){
        $products_sale = DB::table('products_sales')->where('sale_id',$id)->get();
        //set to in_sale = 0 in products table for any matches
        foreach($products_sale as $product){
            DB::table('products')->where('id',$product->product_id)->update([
                'in_sale' => 0
            ]); 
        }
        DB::table('sales')->where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Coupon successfully deleted!');
    }
}
