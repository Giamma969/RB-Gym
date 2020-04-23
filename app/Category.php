<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categories(){
        return $this->hasMany('App\Category','parent_id');
    }

    // public static function checkStatusCategories(){
    //     $count = DB::table('categories')->where(['status'=>0, 'parent_id'=>0])->count();
    //     if($count <= 2){
    //         return redirect()->back()->with('flash_message_error','Sorry. There are not enough active main categories!');
    //     }       
    // }
}
