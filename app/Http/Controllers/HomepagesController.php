<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Image;

class HomepagesController extends Controller
{
    public function viewHomepages(){
        $homepages= DB::table('homepages')->get();
        return view('admin.homepages.view_homepages')->with(compact('homepages'));
    }
    
    public function updateImage($homepage_id, $name){
        $image = DB::table('homepages')->where(['id'=>$homepage_id])->first();
        if($image->$name != '' && $image->$name != NULL){
            $image = $image->$name;
            $image_path= 'images/backend_images/homepages/';
            if(file_exists($image_path.$image)){
                unlink($image_path.$image);
            }
            // DB::table('homepages')->where(['id'=>$homepage_id])->update([$name =>'']);
        }

        $image_tmp= Input::file($name);
        if($image_tmp->isValid()){
            $extension= $image_tmp->getClientOriginalExtension();
            $name= rand(111,99999).'.'.$extension;
            $image_path= 'images/backend_images/homepages/'.$name;
            Image::make($image_tmp)->save($image_path);
        }
        return $name;
    }
    public function customizeHomepage(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();

            //check if the selections are actives categories
            if(!DB::table('categories')->where(['id'=> $data['first_grid'], 'status'=>1])->exists())
                return redirect()->back()->with('flash_message_error','Some selections do not correspond to active categories!');
            if(!DB::table('categories')->where(['id'=> $data['second_grid'], 'status'=>1])->exists())
                return redirect()->back()->with('flash_message_error','Some selections do not correspond to active categories!');
            if(!DB::table('categories')->where(['id'=> $data['third_grid'], 'status'=>1])->exists())
                return redirect()->back()->with('flash_message_error','Some selections do not correspond to active categories!');
            if(!DB::table('categories')->where(['id'=> $data['first_slider'], 'status'=>1])->exists())
                return redirect()->back()->with('flash_message_error','Some selections do not correspond to active categories!');
            if(!DB::table('categories')->where(['id'=> $data['second_slider'], 'status'=>1])->exists())
                return redirect()->back()->with('flash_message_error','Some selections do not correspond to active categories!');


            if($request->hasfile('first_grid_image')){
                $first_grid_image = $this->updateImage($id,"first_grid_image");
            }else{
                $first_grid_image = $data['current_first_grid_image'];
            }

            if($request->hasfile('second_grid_image')){
                $second_grid_image = $this->updateImage($id,"second_grid_image");
            }else{
                $second_grid_image = $data['current_second_grid_image'];
            }

            if($request->hasfile('third_grid_image')){
                $third_grid_image = $this->updateImage($id,"third_grid_image");
            }else{
                $third_grid_image = $data['current_third_grid_image'];
            }

            if($request->hasfile('first_slider_image')){
                $first_slider_image = $this->updateImage($id,"first_slider_image");
            }else{
                $first_slider_image = $data['current_first_slider_image'];
            }

            if($request->hasfile('second_slider_image')){
                $second_slider_image = $this->updateImage($id,"second_slider_image");
            }else{
                $second_slider_image = $data['current_second_slider_image'];
            }

            if($request->hasfile('middle_image')){
                $middle_image = $this->updateImage($id,"middle_image");
            }else{
                $middle_image = $data['current_middle_image'];
            }

            
            DB::table('homepages')->where('id',$id)->update([
                'first_grid'=>$data['first_grid'],
                'first_grid_image'=>$first_grid_image,
                'second_grid'=>$data['second_grid'],
                'second_grid_image'=>$second_grid_image,
                'third_grid'=>$data['third_grid'],
                'third_grid_image'=>$third_grid_image,
                'first_slider'=>$data['first_slider'],
                'first_slider_image'=>$first_slider_image,
                'second_slider'=>$data['second_slider'],
                'second_slider_image'=>$second_slider_image,
                'middle_image'=>$middle_image
            ]);
            return redirect()->back()->with('flash_message_success','Operation successfully performed!');   
            
        }

        $categories = DB::table('categories')->where('status', 1)->get();
        $homepageDetails= DB::table('homepages')->where('id',$id)->first();
        // echo'<pre>'; print_r($homepageDetails); die;
        return view('admin.homepages.customize_homepage')->with(compact('homepageDetails','categories'));
    
    }
    
}
