<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public static function haveGroups($id){
        $exist = DB::table('group_user')->where('user_id',$id)->exists();
        return $exist;
    }

    public static function getGroupsDev($id){
        $groups = DB::table('group_user')->where('user_id',$id)->join('groups','groups.id', '=', 'group_user.group_id')->select('groups.id','groups.name')->get();
        //echo'<pre>'; print_r($groups); die;
        return $groups;
    }

    public static function countGroups($id){
        $count = DB::table('group_user')->where('user_id',$id)->join('groups','groups.id', '=', 'group_user.group_id')->count();

        return $count;
    }

    public static function getFirstGroup($id){
        $groups = DB::table('group_user')->where('user_id',$id)
            ->join('groups','groups.id', '=', 'group_user.group_id')->select('groups.id','groups.name')->first();
        return $groups;
    }
    
    
}
