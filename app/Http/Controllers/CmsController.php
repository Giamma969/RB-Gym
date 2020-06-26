<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Image;
use App\Category;
use App\Cart;

class CmsController extends Controller
{   
    //admin
    public function viewCms(){
        $cms = DB::table('cms')->get();
        return view('admin.cms.view_cms')->with(compact('cms'));
    }

    //admin
    public function editCms(Request $request, $id){
        if($request->isMethod('post')){
            $data=$request->all();

            if($request->hasfile('logo')){
                
                $logoImage = DB::table('cms')->where('id',1)->first();
        
                if($logoImage->logo != '' && $logoImage->logo != NULL){
                    //get image's paths
                    $small_image_path = 'images/frontend_images/logo/';

                    //delete small image if not exists in directory
                    if(file_exists($small_image_path.$logoImage->logo)){
                        unlink($small_image_path.$logoImage->logo);
                    }

                    DB::table('cms')->where('id',$id)->update(['logo'=> NULL]);
                }

                $image_tmp= Input::file('logo');
                if($image_tmp->isValid()){
                    $extension= $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $small_image_path= 'images/frontend_images/logo/'.$filename;
                    //Resize image code
                    Image::make($image_tmp)->resize(500,150)->save($small_image_path);
                }   
            }else{
                $filename = $data['current_logo'];
            }

            DB::table('cms')->where('id',$id)->update([
                'title_first_section_privacy' => $data['title_first_section_privacy'],
                'first_section_privacy' => $data['first_section_privacy'],
                'title_second_section_privacy' => $data['title_second_section_privacy'],
                'second_section_privacy' => $data['second_section_privacy'],
                'title_third_section_privacy' => $data['title_third_section_privacy'],
                'third_section_privacy' => $data['third_section_privacy'],
                'title_first_section_about_us' => $data['title_first_section_about_us'],
                'first_section_about_us' => $data['first_section_about_us'],
                'title_second_section_about_us' => $data['title_second_section_about_us'],
                'second_section_about_us' => $data['second_section_about_us'],
                'title_third_section_about_us' => $data['title_third_section_about_us'],
                'third_section_about_us' => $data['third_section_about_us'],
                'address'=>$data['address'],
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'facebook'=>$data['facebook'],
                'twitter'=>$data['twitter'],
                'instagram'=>$data['instagram'],
                'logo'=>$filename
            ]);
            return redirect()->back()->with('flash_message_success','CMS successfully edited!');

        }
        $cmsDetails = DB::table('cms')->where('id',$id)->first();
        return view('admin.cms.edit_cms')->with(compact('cmsDetails'));
    }

    public function aboutUs(){
        $categories = Category::with('categories')->where(['parent_id'=>0, 'status'=>1])->get();
        $userCart = Cart::getProductsCart();
        $cmsDetails = DB::table('cms')->where('id',1)->first();
        return view('cms.about_us')->with(compact('cmsDetails','categories','userCart'));
    }


    public function privacy(){
        $categories = Category::with('categories')->where(['parent_id'=>0, 'status'=>1])->get();
        $userCart = Cart::getProductsCart();
        $cmsDetails = DB::table('cms')->where('id',1)->first();
        // echo'<pre>'; print_r($cmsDetails); die;
        return view('cms.privacy')->with(compact('cmsDetails','categories','userCart'));
    }
    


}
