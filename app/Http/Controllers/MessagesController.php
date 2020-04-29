<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function viewMessages(){
        $messages = DB::table('contact_us')->get();
        return view('admin.messages.view_messages')->with(compact('messages')); 
    }

    public function editMessage(Request $request, $id){
        if($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['resolved'])){
                $data['resolved'] = 0;
            }
            DB::table('contact_us')->where('id',$id)->update([
                'resolved'=>$data['resolved'],
            ]);
            return redirect()->back()->with('flash_message_success','Operation performed successfully!');
        }
        $messageDetails = DB::table('contact_us')->where('id',$id)->first();
        return view('admin.messages.edit_message')->with(compact('messageDetails')); 

    }
}
