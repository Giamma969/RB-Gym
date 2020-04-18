<?php

namespace App;

use Auth;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;



class User extends Authenticatable
{
    use Notifiable;
    use Billable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getPermissions(){
        $user_id=Auth::user()->id;
        //echo ($user_id); die;
        $services = DB::table('group_user')->where('user_id',$user_id)
            ->join('groups','groups.id','=','group_user.group_id')->where('groups.status','=','1')
            ->join('group_service','group_service.group_id','=','groups.id')
            ->join('services','services.id','=','group_service.service_id')
            ->select('services.service_name')
            ->get();
        
        $array = array();
        foreach($services as $service){
            array_push($array, $service->service_name);
        }
        return $array;
    }

    public static function checkIfAdmin(){
        $user_id=Auth::user()->id; 
        $is_admin = DB::table('users')->where(['id'=>$user_id, 'admin'=>1])->exists();
        return $is_admin;
    }

   
}
