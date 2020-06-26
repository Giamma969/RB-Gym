<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Cart;


class BrandsController extends Controller
{
    public function addBrand(Request $request){
        if($request->isMethod('post')){ 
            $data=$request->all();
            if(empty($data['name']) || empty($data['description'])) //|| empty($data['logo']) )
                return redirect()->back()->with('flash_message_error','Please fill all fields!');

            //check name if already exists
            if(DB::table('brands')->where('name',$data['name'])->exists())
                return redirect()->back()->with('flash_message_error','The brand name "'.$data['name'].'" is not available!');

            if($request->hasfile('logo')){
                $image_tmp= Input::file('logo');
                if($image_tmp->isValid()){
                    $extension= $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path= 'images/backend_images/brands/large/'.$filename;
                    $medium_image_path= 'images/backend_images/brands/medium/'.$filename;
                    $small_image_path= 'images/backend_images/brands/small/'.$filename;
                        //Resize image code
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }

            DB::table('brands')->insert([
                'name'=>$data['name'],
                'description'=>$data['description'],
                // da rimettere 'logo'=>$filename 
            ]);
            
            return redirect()->back()->with('flash_message_success','Brand successfully added!');
        }
        return view('admin.brands.add_brand');
    }

    

    public function editBrand(Request $request, $name=null){
        if($request->isMethod('post')){
            $data=$request->all();
            
            if(empty($data['name']) || empty($data['description']) )
                return redirect()->back()->with('flash_message_error','Please fill all fields!');
            
            //check if brand name already exists
            $count_name = DB::table('brands')->where('name', $data['name'])->count();
            $current_name = DB::table('brands')->where('name', $name)->first();
            $current_name=$current_name->name;
            if($count_name > 0 && $data['name'] != $current_name)
                return redirect()->back()->with("flash_message_error","Brand name not available!");
            
            $filename = NULL;

            if($request->hasfile('logo')){
                $brandImage = DB::table('brands')->where(['name' => $name])->first();
        
                if($brandImage->logo != '' && $brandImage->logo != NULL){
                    //get image's paths
                    $large_image_path = 'images/backend_images/brands/large/';
                    $medium_image_path = 'images/backend_images/brands/medium/';
                    $small_image_path = 'images/backend_images/brands/small/';

                    //delete large image if not exists in directory
                    if(file_exists($large_image_path.$brandImage->logo)){
                        unlink($large_image_path.$brandImage->logo);
                    }

                    //delete medium image if not exists in directory
                    if(file_exists($medium_image_path.$brandImage->logo)){
                        unlink($medium_image_path.$brandImage->logo);
                    }

                    //delete small image if not exists in directory
                    if(file_exists($small_image_path.$brandImage->logo)){
                        unlink($small_image_path.$brandImage->logo);
                    }

                    //delete image from brand table
                    DB::table('brands')->where(['name'=>$name])->update(['logo'=>NULL]);
                }
                $image_tmp= Input::file('logo');
                if($image_tmp->isValid()){
                    $extension= $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path= 'images/backend_images/brands/large/'.$filename;
                    $medium_image_path= 'images/backend_images/brands/medium/'.$filename;
                    $small_image_path= 'images/backend_images/brands/small/'.$filename;
                    //Resize image code
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }
            else{
                $filename = $data['current_logo'];
            }
            
            DB::table('brands')->where('name',$name)->update([
                'name'=>$data['name'],
                'description'=>$data['description'],
                'logo'=>$filename    
            ]);

            return redirect()->back()->with('flash_message_success','Brand successfully edited!');
        }

        $brandDetails = DB::table('brands')->where('name',$name)->first();
        return view('admin.brands.edit_brand')->with(compact('brandDetails'));
    }

    public function viewBrands(){
        $brands = DB::table('brands')->get();
        return view('admin.brands.view_brands')->with(compact('brands'));
    }

    public function deleteBrand($name){
        //unlink image
        $brandImage = DB::table('brands')->where(['name' => $name])->first();
        
        if($brandImage->logo != '' && $brandImage->logo != NULL){
            //get image's paths
            $large_image_path = 'images/backend_images/brands/large/';
            $medium_image_path = 'images/backend_images/brands/medium/';
            $small_image_path = 'images/backend_images/brands/small/';

            //delete large image if not exists in directory
            if(file_exists($large_image_path.$brandImage->logo)){
                unlink($large_image_path.$brandImage->logo);
            }

            //delete medium image if not exists in directory
            if(file_exists($medium_image_path.$brandImage->logo)){
                unlink($medium_image_path.$brandImage->logo);
            }

            //delete small image if not exists in directory
            if(file_exists($small_image_path.$brandImage->logo)){
                unlink($small_image_path.$brandImage->logo);
            }

            //delete image from brand table
            DB::table('brands')->where(['name'=>$name])->update(['logo'=>NULL]);
        }
        DB::table('brands')->where(['name'=>$name])->delete();
        return redirect()->back()->with('flash_message_success','Brand successfully deleted!');   
    }

    public function showBrand($name){
        $categories = Category::with('categories')->where(['parent_id'=>0, 'status'=>1])->get();
        $userCart = Cart::getProductsCart();
        $brandDetails = DB::table('brands')->where('name',$name)->first();
        $cmsDetails = DB::table('cms')->where('id',1)->first();
        return view('brands.brand')->with(compact('brandDetails','userCart','categories','cmsDetails'));
    }
}