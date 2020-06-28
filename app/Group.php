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

        //brands permissions
        if(!empty($data['view_brands_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_brands_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id' => $service_id,
                'group_id' => $group_id,
            ]);
        }
        if(!empty($data['add_brand_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['add_brand_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['edit_brand_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_brand_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['delete_brand_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['delete_brand_permission'])->first();
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

        //homepages permissions
        if(!empty($data['view_homepages_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_homepages_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['customize_homepage_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['customize_homepage_permission'])->first();
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

        //sales permissions
        if(!empty($data['view_sales_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_sales_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['add_sale_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['add_sale_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['edit_sale_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_sale_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }
        if(!empty($data['delete_sale_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['delete_sale_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['products_sale_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['products_sale_permission'])->first();
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

        //developers permissions
        if(!empty($data['view_developers_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_developers_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['add_developer_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['add_developer_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_developer_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_developer_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['delete_developer_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['delete_developer_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //groups permissions
        if(!empty($data['view_groups_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_groups_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['add_group_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['add_group_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_group_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_group_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['delete_group_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['delete_group_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //services permissions
        if(!empty($data['view_services_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_services_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //shipping charges permissions
        if(!empty($data['view_shipping_charges_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_shipping_charges_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_shipping_charges_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_shipping_charges_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //CMS permissions
        if(!empty($data['view_cms_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_cms_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_cms_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_cms_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //Messages permissions
        if(!empty($data['view_messages_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_messages_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_message_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_message_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        //Faqs permissions
        if(!empty($data['view_faqs_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['view_faqs_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['edit_faq_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['edit_faq_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['add_faq_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['add_faq_permission'])->first();
            $service_id=$service_id->id;
            DB::table('group_service')->insert([
                'service_id'=> $service_id,
                'group_id'=>$group_id,
            ]);
        }

        if(!empty($data['delete_faq_permission'])){
            $service_id = DB::table('services')->where('service_name',$data['delete_faq_permission'])->first();
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


        //BRANDS PERMISSIONS

        //view brands
        $service = DB::table('services')->where(['service_name'=> "view_brands"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_brands_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_brands_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //add brand
        $service = DB::table('services')->where(['service_name'=> "add_brand"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_brand_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_brand_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //edit brand
        $service = DB::table('services')->where(['service_name'=> "edit_brand"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_brand_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_brand_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //delete brand
        $service = DB::table('services')->where(['service_name'=> "delete_brand"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_category_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_brand_permission'])){
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


        //HOMEPAGES PERMISSIONS
        //view homepages
        $service = DB::table('services')->where(['service_name'=> "view_homepages"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_homepages_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_homepages_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //customize homepage
        $service = DB::table('services')->where(['service_name'=> "customize_homepage"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['customize_homepage_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['customize_homepage_permission'])){
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

        //Sales PERMISSIONS

        //View sales
        $service = DB::table('services')->where(['service_name'=> "view_sales"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_sales_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_sales_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Add sale
        $service = DB::table('services')->where(['service_name'=> "add_sale"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_sale_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_sale_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit sale
        $service = DB::table('services')->where(['service_name'=> "edit_sale"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_sale_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_sale_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Delete sale
        $service = DB::table('services')->where(['service_name'=> "delete_sale"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_sale_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_sale_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Products sale
        $service = DB::table('services')->where(['service_name'=> "products_sale"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['products_sale_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['products_sale_permission'])){
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

        //DEVELOPERS PERMISSIONS
        //View developers
        $service = DB::table('services')->where(['service_name'=> "view_developers"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_developers_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_developers_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

         //Add developer
         $service = DB::table('services')->where(['service_name'=> "add_developer"])->first();
         $service_id=$service->id;
         $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
         if($service_check){
             if(empty($data['add_developer_permission'])){
                 DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
             }
         }else{
             if(!empty($data['add_developer_permission'])){
                 DB::table('group_service')->insert([
                     'service_id' => $service_id,
                     'group_id' => $group_id,
                 ]);
             }
         }

         //Edit developer
         $service = DB::table('services')->where(['service_name'=> "edit_developer"])->first();
         $service_id=$service->id;
         $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
         if($service_check){
             if(empty($data['edit_developer_permission'])){
                 DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
             }
         }else{
             if(!empty($data['edit_developer_permission'])){
                 DB::table('group_service')->insert([
                     'service_id' => $service_id,
                     'group_id' => $group_id,
                 ]);
             }
         }

        //Delete developer
        $service = DB::table('services')->where(['service_name'=> "delete_developer"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_developer_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_developer_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //GROUPS PERMISSIONS
        //View groups
        $service = DB::table('services')->where(['service_name'=> "view_groups"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_groups_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_groups_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Add group
        $service = DB::table('services')->where(['service_name'=> "add_group"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_group_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_group_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit group
        $service = DB::table('services')->where(['service_name'=> "edit_group"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_group_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_group_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Delete group
        $service = DB::table('services')->where(['service_name'=> "delete_group"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_group_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_group_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //SERVICES PERMISSIONS
        //View services
        $service = DB::table('services')->where(['service_name'=> "view_services"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_services_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_services_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Shipping charges PERMISSIONS
        //View shipping charges
        $service = DB::table('services')->where(['service_name'=> "view_shipping_charges"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_shipping_charges_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_shipping_charges_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit shipping charges
        $service = DB::table('services')->where(['service_name'=> "edit_shipping_charges"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_shipping_charges_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_shipping_charges_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //CMS PERMISSIONS
        //View CMS
        $service = DB::table('services')->where(['service_name'=> "view_cms"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_cms_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_cms_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit CMS
        $service = DB::table('services')->where(['service_name'=> "edit_cms"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_cms_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_cms_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //MESSAGES PERMISSIONS
        //View messages
        $service = DB::table('services')->where(['service_name'=> "view_messages"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_messages_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_messages_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Edit message
        $service = DB::table('services')->where(['service_name'=> "edit_message"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_message_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_message_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //FAQS PERMISSIONS
        //View faqs
        $service = DB::table('services')->where(['service_name'=> "view_faqs"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['view_faqs_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['view_faqs_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //add faq
        $service = DB::table('services')->where(['service_name'=> "add_faq"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['add_faq_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['add_faq_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //edit faq
        $service = DB::table('services')->where(['service_name'=> "edit_faq"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['edit_faq_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['edit_faq_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }

        //Delete faq
        $service = DB::table('services')->where(['service_name'=> "delete_faq"])->first();
        $service_id=$service->id;
        $service_check = DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->exists();
        if($service_check){
            if(empty($data['delete_faq_permission'])){
                DB::table('group_service')->where(['group_id'=> $group_id,'service_id'=>$service_id])->delete();
            }
        }else{
            if(!empty($data['delete_faq_permission'])){
                DB::table('group_service')->insert([
                    'service_id' => $service_id,
                    'group_id' => $group_id,
                ]);
            }
        }


        

    }
}
