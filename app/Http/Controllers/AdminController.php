<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use \DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request-> isMethod ('post')){
            $data=$request-> input();
            //check if user is the admin
            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1', 'status'=>'1'])){
                Session::put('admin_session', $data['email']);
                $new_session=str_random(40);
                Session::put('admin_session_id',$new_session);
                return redirect('/admin/dashboard');
            }
            //check if user is a developer
            else if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'developer'=>'1','status'=>'1'])){
                Session::put('dev_session', $data['email']);
                $new_session=str_random(40);
                Session::put('dev_session_id',$new_session);
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/admin')->with('flash_message_error', 'invalid Username or Password');
            }
        }
   	    return view('admin.admin_login');
    }


    public function dashboard(){
        if(Session::has('admin_session') || Session::has('dev_session') ){
        }else{
            return redirect('/admin')-> with('flash_message_error', 'Please login to access');
        }
        return view('admin.dashboard');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $user_id=Auth::user()->id;
        $check_password = User::where(['id'=>$user_id])->first();
        if(Hash::check($current_password, $check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $current_password = User::where(['email'=> Auth::user()->email])->first();
            $current_password = $current_password->password;
            $check_password= $data['current_pwd'];
            $user_id=Auth::user()->id;
            if(Hash::check($check_password, $current_password)){
                $password= bcrypt($data['new_pwd']);
                User::where('id',$user_id)-> update(['password'=>$password]);
                //insert data in password resets
                DB::table('password_resets')->insert([
                'user_id'=>$user_id,
                'old_password'=>$current_password,
                'new_password' => $password,
                'recovered' => 0,
                'updated' => 1,
            ]);
                return redirect('/admin/settings')->with('flash_message_success','Password update successfuly');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','incorrect current Password ');
            }
        }
     }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out Successfully');
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $usersCount = DB::table('users')
                ->where(['email'=>$data['user_email'],'admin'=>1])
                ->orwhere(['email'=>$data['user_email'],'developer'=>1])
                ->count();
            if($usersCount == 0){
                return redirect()->back()->with('flash_message_error','L\'Email non esiste!');
            }
            //get user details
            $userDetails=User::where('email',$data['user_email'])->first();
            $user_id = $userDetails->id;
            $old_password = $userDetails->password;
            
            //generate random password
            $random_password=str_random(10);
            $new_password =bcrypt($random_password);
            
            //update user table
            User::where('email',$data['user_email'])->update(['password'=>$new_password]);

            //insert data in password resets
            DB::table('password_resets')->insert([
                'user_id'=>$user_id,
                'old_password'=>$old_password,
                'new_password' => $new_password,
                'recovered' => 1,
            ]);

            //send forgot password email
            $email=$data['user_email'];
            $name=$userDetails->name;
            $messageData = [
                'email' => $email,
                'password'=>$random_password,
                'name'=>$name
            ];

            Mail::send('emails.forgotpassword', $messageData, function($message) use($email){
                $message->to($email)->subject('New Password RB-Gym');
            });

            return redirect()->back()->with('flash_message_success','Please check your email for new password!');

        }
    }
}