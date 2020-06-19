<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
  public function addCategory(Request $request){
    if($request->isMethod('post')){
      $data = $request->all();

      //check if category name exists
      $count_name = DB::table('categories')->where('name', $data['category_name'])->count();
      if($count_name > 0)
          return redirect()->back()->with("flash_message_error","Category name not available!");
        
      //check if category url exists
      $count_url = DB::table('categories')->where('name', $data['url'])->count();
      if($count_url > 0)
          return redirect()->back()->with("flash_message_error","Category url not available!");
        
      if(empty($data['status'])){
        $status = 0;
      }else{
        $status = 1;
      }
      $category= new Category;
      $category->name = $data['category_name'];
      $category->parent_id = $data['parent_id'];
      $category->description = $data['description'];
      $category->url = $data['url'];
      $category->status = $status;
      $category->save();
      return redirect()->back()->with('flash_message_success','Category successfully added!');;
    }
    $levels = Category::where(['parent_id'=>0])->get();
      return view('admin.categories.add_category')->with(compact('levels'));
  }

  public function editCategory(Request $request, $id = null){
    if($request->isMethod('post')) {
      $data = $request->all();

       //check if name exists
       $count_name = DB::table('categories')->where('name', $data['category_name'])->count();
       $current_name = DB::table('categories')->where('id', $id)->first();
       $current_name=$current_name->name;
       if($count_name > 0 && $data['category_name']!==$current_name)
           return redirect()->back()->with("flash_message_error","Category name not available!");
      
       //check if url exists
       $count_url = DB::table('categories')->where('url', $data['url'])->count();
       $current_url = DB::table('categories')->where('id', $id)->first();
       $current_url=$current_url->url;
       if($count_url > 0 && $data['url']!==$current_url)
           return redirect()->back()->with("flash_message_error","Category url not available!");
        
      //echo"<pre>"; print_r($data); die;
      if(empty($data['status'])){
        $status = 0;
      }else{
        $status = 1;
      }

      Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url'],'status'=>$status]);
      return redirect()->back()->with('flash_message_success', 'Category successfully updated!');
    }
    $categoryDetails = Category::where(['id'=>$id])->first();
    $levels = Category::where(['parent_id'=>0])->get();
    return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));

  }
  public function deleteCategory(Request $request, $id= null){
    if(!empty($id)){
      Category::where(['id'=>$id])->delete();
      return redirect()->back()->with('flash_message_success','Category successfully deleted!');
    }
  }
   public function viewCategories(Request $request){
    
    $categories= Category::get();
    $categories= json_decode(json_encode($categories));
    /*echo "<pre>";print_r($categories); die;*/
    return view('admin.categories.view_categories')->with(compact('categories'));
  }
}
