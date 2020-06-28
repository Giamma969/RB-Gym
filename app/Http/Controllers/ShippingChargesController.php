<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShippingChargesController extends Controller
{
    public function viewSippingCharges() {
        $shippingCharges = DB::table('shipping_charges')->get();
        return view('admin.shipping_charges.view_shipping_charges')->with(compact('shippingCharges'));
    }

    public function editSippingCharges(Request $request, $id=null) {
        if($request->isMethod('post')){
            $data=$request->all();

            if(empty($data['free_shipping']) || empty($data['price']) || empty($data['estimate_delivery_start']) || empty($data['estimate_delivery_end']))
                return redirect()->back()->with('flash_message_error','Please fill all fields!');
            
            if($data['free_shipping'] < 1 || $data['price'] < 1 || $data['estimate_delivery_start'] < 1 || $data['estimate_delivery_end'] < 1)
                return redirect()->back()->with('flash_message_error','Please enter allowed values!');




            DB::table('shipping_charges')->where('id',$id)->update([
                'free_shipping' => $data['free_shipping'],
                'price' => $data['price'],
                'estimate_delivery_start' => $data['estimate_delivery_start'],
                'estimate_delivery_end' => $data['estimate_delivery_end']
            ]);
            return redirect()->back()->with('flash_message_success','Shipping charges successfully edited!');
        }
        $shippingDetails = DB::table('shipping_charges')->where('id',$id)->first();
        return view('admin.shipping_charges.edit_shipping_charges')->with(compact('shippingDetails'));

    }
}
