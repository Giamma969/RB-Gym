<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class DevelopersController extends Controller
{
    public function addDeveloper(Request $request){
        
        if($request->isMethod('post')){
            $data=$request->all();

            if(empty($data['developer_name']) || empty($data['developer_surname']) || empty($data['developer_email'])){
                return redirect()->back()->with("flash_message_error","Please fill all fields!");
            }

            $password=str_random(15);
            DB::table('users')->insert([
                'name'=> $data['developer_name'],
                'surname'=> $data['developer_surname'],
                'email'=> $data['developer_email'],
                'password' => bcrypt($password),
                'status' => 1,
                'developer' => 1,
            ]);

            //assign groups

            //send password by email
            $email=$data['developer_email'];
            $messageData = ['email'=>$data['developer_email'], 'name'=>$data['developer_name'], 
            'surname'=>$data['developer_surname'], 'password'=>$password,'code'=>base64_encode($data['developer_email'])];
            Mail::send('emails.welcome_developer', $messageData, function($message) use($email){
                $message->to($email)->subject('Welcome among the developers of the RB-Gym');
            });

            return redirect()->back()->with("flash_message_success","Developer added successfully. The password was emailed to him!");
        }
        
        return view('admin.developers.add_developer');
    }
}
