<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ModelHasRoles;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class ModelHasRolesController extends Controller
{
    public function addModelHasRoles(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
           
            //$user = User::find($data['username'])->get();
            $role=Role::find($data['role_name']);
            
            echo'<pre>' .$role.'</pre>'; die;

            $modelhasroles = new ModelHasRoles;
            $modelhasroles->role_id = $role;
            $modelhasroles->model_id = $user;
            $modelhasroles->model_type="App\User";

            auth()->$user->assignRole($role);
            
            return redirect('/admin/view-models-has-roles')->with('flash_message_success','Assegnazione eseguita con successo!');;
        }

        $roles = Role::where(['guard_name' => 'web'])->get();
        $users = User::where(['admin'=> 0])->get();
        return view('admin.model_has_roles.add_model_has_roles')->with(compact('users','roles'));
    }

    public function editModelHasRoles(Request $request, $role_id=null, $model_id=null){
        /*if($request->isMethod('post')){
            $data = $request->all();
            $modelhasroles = ModelHasRoles::find($role_id,'App\User',$model_id);

            $modelhasroles->role_id = $data[''];
            $modelhasroles->model_id = $data['guard_name'];
            
            $role->save();
            return redirect()->action('RolesController@viewRoles')->with('flash_message_success','Gruppo modificato con successo!');
        
        }*/       
        $modelhasrolesDetails = ModelHasRoles::where(['role_id' => $role_id,'model_id' => $model_id])->get();
        echo '<pre>' .$modelhasrolesDetails. '</pre>';
        return view('admin.model_has_roles.edit_model_has_roles')->with(compact('modelhasrolesDetails'));
    }

    public function viewModelsHasRoles(){
        $modelhasroles=ModelHasRoles::all();
        return view('admin.model_has_roles.view_models_has_roles')->with(compact('modelhasroles'));
    }
}
