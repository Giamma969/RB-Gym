<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Address;
use App\Developer;
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

            //check if email exists
            if(DB::table('users')->where('email', $data['developer_email'])->exists())
                return redirect()->back()->with("flash_message_error","Email not available!");

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

    public function viewDevelopers(){
        $container = [[]];
        $developers = DB::table('users')->where('developer',1)
            ->select('id as user_id','name as user_name','surname as user_surname','email','status','created_at')
            ->get();
            // ->join('group_user','group_user.user_id','=','users.id')
            // ->join('groups','groups.id','=','group_user.group_id')
            // ->select('group_user.user_id','users.name','users.surname','users.email','users.status',
            //     'users.created_at','group_user.group_id','groups.name as group_name',)    
           
        //$container = (array) $developers;

        //echo'<pre>'; print_r($container); die;
        // foreach($developers as $dev){
            
        //     $groups = DB::table('group_user')->where('user_id',$dev->user_id)
        //         ->join('groups','groups.id','=','group_user.group_id')
        //         ->select('groups.id as group_id','groups.name as group_name')
        //         ->get();

        //     $items = new \stdClass();
        //     $developers->items = $items;
        //     echo'<pre>'; print_r($developers); die;

        //     foreach($groups as $group){
                
        //         $id=$group->group_id;
        //         $name=$group->group_name;
        //         $items->$id=$id; 
        //         array_push($array, $group);
        //     }
        //     array_push($dev, $array);
        // }
        //echo'<pre>'; print_r($developers); die;
        return view('admin.developers.view_developers')->with(compact('developers'));
    }

    public function viewDeveloperGroups($id){
        $groups = Developer::getGroupsDev($id);
        //echo'<pre>'; print_r($groups); die;
        return view('admin.developers.view_developer_groups')->with(compact('groups')); 
    }

    public function editDeveloper($id, Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['developer_name']) || empty($data['developer_surname']) || empty($data['developer_email'])){
                return redirect()->back()->with("flash_message_error","Please fill all fields!");
            }

            //check if email exists
            $count_email = DB::table('users')->where('email', $data['developer_email'])->count();
            $current_email = DB::table('users')->where('id', $id)->first();
            $current_email=$current_email->email;
            if($count_email > 0 && $data['developer_email']!==$current_email)
                return redirect()->back()->with("flash_message_error","Email not available!");

            
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
           
            DB::table('users')->where(['id'=>$id,'developer'=>1])->update([
                'name'=> $data['developer_name'],
                'surname'=> $data['developer_surname'],
                'email'=> $data['developer_email'],
                'status' => $status,
            ]);
            
            //edit groups
            foreach($groups_name as $group){
                $group_id = DB::table('groups')->where('name',$group->name)->first();
                $group_id = $group_id->id;
                //se il gruppo è nell'array
                if(in_array($group->name, $keys)){
                    //se non c'era --> lo inserisco
                    if(!(DB::table('group_user')->where(['user_id'=>$id, 'group_id'=>$group_id])->exists())){
                        DB::table('group_user')->insert([
                            'user_id' => $id,
                            'group_id' => $group_id,
                        ]); 
                    }
                }else{
                    if((DB::table('group_user')->where(['user_id'=>$id, 'group_id'=>$group_id])->exists())){
                        DB::table('group_user')->where([
                            'user_id' => $id,
                            'group_id' => $group_id,
                        ])->delete(); 
                    }
                }
            }
            return redirect()->back()->with("flash_message_success","Developer updated successfully!");

        }

        $groupsDetails = DB::table('groups')->get();
        $developerDetails = DB::table('users')->where(['id'=>$id, 'developer'=>1])->first();
        $groupsDeveloper = Developer::getGroupsDev($developerDetails->id);
        $groupDev = array();
        foreach($groupsDeveloper as $group){
            array_push($groupDev, $group->name);
        }
        //echo'<pre>'; print_r($groupDev); die;
        return view('admin.developers.edit_developer')->with(compact('developerDetails','groupsDetails','groupDev'));
    }

    public function deleteDeveloper($id=null){
        DB::table('users')->where(['id'=>$id, 'developer'=>1])->delete();
        return redirect()->back()->with('flash_message_success','Developer successfully deleted!');
    }
}
