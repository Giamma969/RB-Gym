<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public static function deleteBannerImage($id){
        //take banner image
        $banner_image = DB::table('banners')->where('id',$id)->first();
        $banner_image = $banner_image->image;

        //get path image
        $banner_image_path = 'images/frontend_images/banners/';

        //delete large image if not exists in directory
        if(file_exists($banner_image_path.$banner_image)){
            unlink($banner_image_path.$banner_image);
        }

        DB::table('banners')->where('id',$id)->update(['image'=>NULL]);
    }
}
