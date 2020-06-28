<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FaqsController extends Controller
{
    public function addFaq(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            empty($data['status'])?$status=0:$status=1;

            DB::table('faqs')->insert([
                'question'=>$data['question'],
                'answer'=>$data['answer'],
                'status'=>$status,
            ]);
            return redirect()->back()->with('flash_message_success','Operation performed successfully!');

        }
        return view('admin.faqs.add_faq');

    }

    public function editFaq(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();

            empty($data['status'])?$status=0:$status=1;
            DB::table('faqs')->where('id',$id)->update([
                'question'=>$data['question'],
                'answer'=>$data['answer'],
                'status'=>$status,
            ]);
            return redirect()->back()->with('flash_message_success','Operation performed successfully!');
        }
        $faqDetails = DB::table('faqs')->where('id',$id)->first();
        return view('admin.faqs.edit_faq')->with(compact('faqDetails'));

    }
    
    public function viewFaqs(){
        $faqs = DB::table('faqs')->orderBy('id','desc')->get();
        return view('admin.faqs.view_faqs')->with(compact('faqs'));
    }

    public function deleteFaq($id){
        DB::table('faqs')->where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Operation performed successfully!');

    }
}
