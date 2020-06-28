<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServicesController extends Controller
{
    public function viewServices(){
        $serviceDetails = DB::table('services')->orderBy('id','desc')->get();
        return view('admin.services.view_services')->with(compact('serviceDetails'));
    }
}
