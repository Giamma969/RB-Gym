<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class RolesController extends Controller
{
    public function addRole(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $role = new Role;
            $role->name = $data['name'];
            $role->guard_name = $data['guard_name'];
            $role = Role::create(['name' => $data['name']]);
            

            $role->save();
            return redirect()->action('RolesController@viewRoles')->with('flash_message_success','Gruppo aggiunto con successo');
        }
        return view('admin.roles.add_role');
    }

    public function editRole(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            $role = Role::find($id);
            $role->name = $data['name'];
            $role->guard_name = $data['guard_name'];
            
            $role->save();
            return redirect()->action('RolesController@viewRoles')->with('flash_message_success','Gruppo modificato con successo!');
        }       
        $roleDetails = Role::find($id);
        return view('admin.roles.edit_role')->with(compact('roleDetails'));

    }

    public function viewRoles(){
        $roles = Role::all();
        return view('admin.roles.view_roles')->with(compact('roles'));
    }

    public function deleteRole($id=null){
        Role::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Gruppo eliminato con successo');
    }
}
