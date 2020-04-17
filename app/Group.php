<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use DB;

class Group extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public static function addGroup($data){

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
    }

    public static function getAllGroupsWithServices(){
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
        return $Details;
    }

    public static function getGroupById($id){
        $group = DB::table('groups')->where('id',$id)->first();
        $groupDetails = array(
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
            $groupDetails[$count] = $service->service_name;
            $count++;
        }
        return $groupDetails;
    }

    public static function editGroup($data,$id){
        if(empty($data['status'])){
            $status = 0;
        }else{
            $status = 1;
        }
        //update group in the database
        DB::table('groups')->where('id',$id)->update([
            'name'=> $data['group_name'],
            'status'=>$status,
        ]);

        //echo '<pre>'; print_r($data); die;
        
        
        $group_id=DB::table('groups')->where('name',$data['group_name'])->first();
        $group_id=$group_id->id;
    
        //CATEGORIES PERMISSIONS

        //view categories
        $service = DB::table('services')->where(['service_name'=> "view_categories"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_categories_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_categories_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //add category
        $service = DB::table('services')->where(['service_name'=> "add_category"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_category_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_category_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //edit category
        $service = DB::table('services')->where(['service_name'=> "edit_category"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_category_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_category_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //delete category
        $service = DB::table('services')->where(['service_name'=> "delete_category"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_category_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_category_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //PRODUCTS PERMISSIONS

        //view products
        $service = DB::table('services')->where(['service_name'=> "view_products"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_products_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_products_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //add products
        $service = DB::table('services')->where(['service_name'=> "add_product"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_product_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_product_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //edit products
        $service = DB::table('services')->where(['service_name'=> "edit_product"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_product_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_product_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //delete products
        $service = DB::table('services')->where(['service_name'=> "delete_product"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_product_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_product_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //alternative product images 
        $service = DB::table('services')->where(['service_name'=> "alternative_images"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['manage_alternative_images'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['manage_alternative_images'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //COUPONS PERMISSIONS

        //view coupons 
        $service = DB::table('services')->where(['service_name'=> "view_coupons"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_coupons_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_coupons_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //add coupon 
        $service = DB::table('services')->where(['service_name'=> "add_coupon"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_coupon_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_coupon_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //edit coupon 
        $service = DB::table('services')->where(['service_name'=> "edit_coupon"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_coupon_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_coupon_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //delete coupon 
        $service = DB::table('services')->where(['service_name'=> "delete_coupon"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_coupon_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_coupon_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //ORDERS PERMISSIONS
        //view orders
        $service = DB::table('services')->where(['service_name'=> "view_orders"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_orders_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_orders_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //update order status
        $service = DB::table('services')->where(['service_name'=> "update_order_status"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['update_order_status_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['update_order_status_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }


        //BANNERS PERMISSIONS

        //View banners
        $service = DB::table('services')->where(['service_name'=> "view_banners"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_banners_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_banners_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Add banner
        $service = DB::table('services')->where(['service_name'=> "add_banner"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_banner_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_banner_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit banner
        $service = DB::table('services')->where(['service_name'=> "edit_banner"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_banner_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_banner_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Delete banner
        $service = DB::table('services')->where(['service_name'=> "delete_banner"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_banner_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_banner_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //USERS PERMISSIONS
        //View users
        $service = DB::table('services')->where(['service_name'=> "view_users"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_users_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_users_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //REVIEWS PERMISSIONS
        //View reviews
        $service = DB::table('services')->where(['service_name'=> "view_reviews"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_reviews_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_reviews_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }


        

    }
}
