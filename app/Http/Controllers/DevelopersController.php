<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function addDeveloper(Request $request){
        if($request->isMethod('post')){
            
        }

        return view('admin.developers.add_developer');
    }
}
