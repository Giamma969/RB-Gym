<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Address;
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

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            $groups_name = DB::table('groups')->select('groups.name')->get();
            $keys = array_keys($data);
            for ($x = 4; $x < count($keys); $x++) {
                $keys[$x] = str_replace("_", " ", $keys[$x]);
            }
           
            $password=str_random(15);
            DB::table('users')->insert([
                'name'=> $data['developer_name'],
                'surname'=> $data['developer_surname'],
                'email'=> $data['developer_email'],
                'password' => bcrypt($password),
                'status' => $status,
                'developer' => 1,
            ]);
            
            $user_id=DB::getPdo()->lastInsertId();
            
            //assign groups
            foreach($groups_name as $group){
                if(in_array($group->name, $keys)){
                    //inserisci
                    $group_id = DB::table('groups')->where('name',$group->name)->first();
                    $group_id = $group_id->id;
                    DB::table('group_user')->insert([
                        'user_id' => $user_id,
                        'group_id' => $group_id,
                    ]); 
                }  
            }
            //echo '<pre>'; print_r($keys); die;
            //echo '<pre>'; print_r($groups); die;


            
            //create billing address
            $bill_address = new Address;
            $bill_address->user_id=$user_id;
            $bill_address->is_billing=1;
            $bill_address->is_shipping=0;
            $bill_address->user_name=$data['developer_name'];
            $bill_address->user_surname=$data['developer_surname'];
            $bill_address->save();

            //update billing_id field in users table
            $billing_id=DB::getPdo()->lastInsertId();
            DB::table('users')->where(['id'=>$user_id])->update(['billing_id'=>$billing_id]);

            //send password by email
            $email=$data['developer_email'];
            $messageData = ['email'=>$data['developer_email'], 'name'=>$data['developer_name'], 
            'surname'=>$data['developer_surname'], 'password'=>$password,'code'=>base64_encode($data['developer_email'])];
            Mail::send('emails.welcome_developer', $messageData, function($message) use($email){
                $message->to($email)->subject('Welcome among the developers of the RB-Gym');
            });

            return redirect()->back()->with("flash_message_success","Developer added successfully. The password was emailed to him!");
        }

        $groupsDetails = DB::table('groups')->get();
        //echo'<pre>'; print_r($groupsDetails); die;
        return view('admin.developers.add_developer')->with(compact('groupsDetails'));
    }
}
