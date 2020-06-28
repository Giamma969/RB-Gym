<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Group;
class GroupsController extends Controller
{
    public function addGroup(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            //check if group name is entered
            if(empty('group_name')){
                return redirect()->back()->with("flash_message_error","Please enter a name for this group!");
            }

            //check if group name already exists
            $count_groups = DB::table('groups')->where('name',$data['group_name'])->count();
            if($count_groups > 0){
                return redirect()->back()->with("flash_message_error","Group name not available!");
            }

            Group::addGroup($data);
           
            return redirect()->back()->with("flash_message_success","Group created successfully!");

        }
        return view('admin.groups.add_group');
    }

    public function viewGroups(){
        $Details = Group::getAllGroupsWithServices();
        // echo'<pre>'; print_r($Details); die;
        return view('admin.groups.view_groups')->with(compact('Details'));
    }

    public function editGroup(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();

            //check if group name exists
            $count_groups = DB::table('groups')->where('name',$data['group_name'])->count();
            $current_name = DB::table('groups')->where('id', $id)->first();
            $current_name=$current_name->name;
            if($count_groups > 0 && $data['group_name']!==$current_name)
                return redirect()->back()->with("flash_message_error","Group name not available!!");


            Group::editGroup($data,$id);
            return redirect()->back()->with("flash_message_success","Group successfully updated!");
        }
        $groupDetails = Group::getGroupById($id);
        return view('admin.groups.edit_group')->with(compact('groupDetails'));
    }

    public function deleteGroup($id=null){
        DB::table('groups')->where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Group successfully deleted!');
    }
}
