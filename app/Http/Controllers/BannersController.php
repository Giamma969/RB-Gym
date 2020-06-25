<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Image;
use App\Banner;

class BannersController extends Controller {

    public function addBanner(Request $request) {
        if($request->isMethod('post')){ 
            $data=$request->all();
            $banner= new Banner;
            $banner->title= $data['title'];
            $banner->link= $data['link'];
            $banner->description= $data['description'];

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
         
            if($request->hasfile('image')){
                $image_tmp= Input::file('image');
                if($image_tmp->isValid()) {
                    $extension= $image_tmp->getClientOriginalExtension();
                    $fileName= rand(111,99999).'.'.$extension;
                    $banner_path= 'images/frontend_images/banners/'.$fileName;                   
                    Image::make($image_tmp)->resize(1920,728)->save($banner_path);
                    $banner->image=$fileName;
                }
            }
            $banner->status = $status;
            $banner->save();
          
            return redirect()->back()->with('flash_message_success','Banner successfully added!');   
        }
        return view('admin.banners.add_banner');
    }

    public function editBanner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            if(empty($data['title'])){
                $data['title'] ='';            
            }

            if(empty($data['link'])){
                $data['link'] ='';
            }

             if(empty($data['description'])){
                $data['description'] ='';
            }

            if($request->hasfile('image')){
                Banner::deleteBannerImage($id);
                $image_tmp= Input::file('image');
                if($image_tmp->isValid()) {
                    $extension= $image_tmp->getClientOriginalExtension();
                    $fileName= rand(111,99999).'.'.$extension;
                    $banner_path= 'images/frontend_images/banners/'.$fileName;                   
                    Image::make($image_tmp)->resize(1920,728)->save($banner_path);
                }
            }else{
                $fileName=$data['current_image'];
            }

            Banner::where('id',$id)->update(['status'=>$status, 'title'=>$data['title'], 'description'=>$data['description'], 'link'=>$data['link'],'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success', 'Banner successfully edited!');
        }
        $bannerDetails= Banner::where('id',$id)->first();
        return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }

    public function viewBanners(){
        $banners = Banner::get();
        return view('admin.banners.view_banners')->with(compact('banners'));
    }

    public function deleteBanner($id=null){
        Banner::deleteBannerImage($id);
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Banner successfully deleted!');
    }
    
}
