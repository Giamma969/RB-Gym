<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Group;
class GroupsController extends Controller
{
    public function addGroup(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            //check if group name is entered
            if(empty('group_name')){
                return redirect()->back()->with("flash_message_error","Please enter a name for this group!");
            }

            //check if group name already exists
            $count_groups = DB::table('groups')->where('name',$data['group_name'])->count();
            if($count_groups > 0){
                return redirect()->back()->with("flash_message_error","Group name not available!");
            }

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            //insert group in the database
            DB::table('groups')->insert([
                'name'=> $data['group_name'],
                'status'=>$status,
            ]);
            
            
            $group_id=DB::getPdo()->lastInsertId();
            
            //categories permissions
            if(!empty($data['view_categories_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_categories_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
            if(!empty($data['add_category_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['add_category_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['edit_category_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['edit_category_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['delete_category_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['delete_category_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
           

            //products permissions
            if(!empty($data['view_products_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_products_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['add_product_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['add_product_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
           
            if(!empty($data['edit_product_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['edit_product_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            
            if(!empty($data['delete_product_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['delete_product_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            
            if(!empty($data['manage_alternative_images'])){
                $service_id = DB::table('services')->where('service_name',$data['manage_alternative_images'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
           
            //coupons permissions
            if(!empty($data['view_coupons_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_coupons_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['add_coupon_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['add_coupon_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['edit_coupon_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['edit_coupon_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['delete_coupon_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['delete_coupon_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
           
            //orders permissions
            if(!empty($data['view_orders_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_orders_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['update_order_status_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['update_order_status_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }

            //banners permissions
            if(!empty($data['view_banners_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_banners_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['add_banner_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['add_banner_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['edit_banner_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['edit_banner_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            if(!empty($data['delete_banner_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['delete_banner_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
    
            //users permissions
            if(!empty($data['view_users_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_users_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
            //reviews permissions
            if(!empty($data['view_reviews_permission'])){
                $service_id = DB::table('services')->where('service_name',$data['view_reviews_permission'])->first();
                $service_id=$service_id->id;
                DB::table('group_service')->insert([
                    'service_id'=> $service_id,
                    'group_id'=>$group_id,
                ]);
            }
           
            return redirect()->back()->with("flash_message_success","Group created successfully!");

        }
        return view('admin.groups.add_group');
    }

    public function viewGroups(){
        $Details = array();
        $groupsDetails = DB::table('groups')->get();
        foreach($groupsDetails as $group){
            $array = array(
                "0" => $group->id,
                "1" => $group->name,
                "2" => $group->status,
            );
            $servicesDetails = DB::table('group_service')->where('group_id',$group->id)
                ->join('services','services.id','=','group_service.service_id')
                ->select('services.*')
                ->get();
            $count=3;
            foreach($servicesDetails as $service){
                $array[$count] = $service->service_name;
                $count++;
            }
            array_push($Details, $array);
        }
        //echo'<pre>'; print_r($Details); die;
        return view('admin.groups.view_groups')->with(compact('Details'));
    }

    public function editGroup(){

    }

    public function deleteGroup($id=null){
        DB::table('groups')->where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Group successfully deleted!');
    }
}
