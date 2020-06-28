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
      if(empty($data['status'])){ $status = 0;}else{$status = 1;}

      //check if homepage has this category showed. If yes return error
      if($status == 0){
        if(DB::table('homepages')->where(['id'=>1, 'first_grid'=>$id])->orWhere(['id'=>1, 'second_grid'=>$id])->orWhere(['id'=>1, 'third_grid'=>$id])->orWhere(['id'=>1, 'first_slider'=>$id])->orWhere(['id'=>1, 'second_slider'=>$id])->exists())
          return redirect()->back()->with("flash_message_error","This category is shown on the homepage. Change the homepage first and then disable this category!");
      }

      Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'parent_id'=>$data['parent_id'], 'url'=>$data['url'],'status'=>$status]);
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
    
    $categories= Category::orderBy('id','desc')->get();
    $categories= json_decode(json_encode($categories));
    /*echo "<pre>";print_r($categories); die;*/
    return view('admin.categories.view_categories')->with(compact('categories'));
  }
}
