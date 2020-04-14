<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function addService(Request $request){
        return view('admin.services.add_service');
    }
}
