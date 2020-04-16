<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServicesController extends Controller
{
    public function viewServices(){
        $serviceDetails = DB::table('services')->get();
        return view('admin.services.view_services')->with(compact('serviceDetails'));
    }
}
