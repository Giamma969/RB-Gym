<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
             //check if product code already exists
             $couponCount=Coupon::where(['coupon_code'=>$data['coupon_code']])->count();
             if($couponCount > 0){
                 return redirect()->back()->with('flash_message_error','Coupon code already exists. Try to generate another coupon code!');
             }
            $coupon = new Coupon;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->used = 0;
            if(empty($data['status'])){
                $coupon->status = 0;
            }
            else{
                $coupon->status = $data['status'];
            }
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_error','Coupon aggiunto con successo');
        }
        return view('admin.coupons.add_coupon');
    }

    public function editCoupon(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //check if product code already exists
            $couponCount=Coupon::where(['coupon_code'=>$data['coupon_code']])->count();
            if($couponCount > 1){
                return redirect()->back()->with('flash_message_error','Coupon code already exists! ');
            } 

            $coupon = Coupon::find($id);
            $coupon->coupon_code=$data['coupon_code'];
            $coupon->amount=$data['amount'];
            $coupon->amount_type=$data['amount_type'];
            $coupon->expiry_date=$data['expiry_date'];
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status=$data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success','Coupon modificato con successo!');
        }       
        $couponDetails = Coupon::find($id);
        return view('admin.coupons.edit_coupon')->with(compact('couponDetails'));

    }

    public function viewCoupons(){
        $coupons = Coupon::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }


    public function deleteCoupon($id=null){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Coupon eliminato con successo');
    }
}
