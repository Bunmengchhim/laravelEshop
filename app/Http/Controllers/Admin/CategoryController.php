<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
 public function index()
    {
      $category = Category::all();
      return view('admin.category.index',compact('category'));
    }

 public function add(){

    return view('admin.category.add');
   
   }

 private function checkDublicate($name){

   $dubplicate = Category::where('name', $name)->count();

   if($dubplicate == 0 ){
      return true;
   }else{
      return false;
   }


 }
 
 public function insert(Request $request){

      if($this->checkDublicate($request->name))
      {
         $category = new Category();
         if($request->hasFile('image'))
         {
             $file = $request->file('image');
             $ext = $file->getClientOriginalExtension();
             $filename = time(). '.' .$ext;
             $file->move('assets/uploads/category' , $filename);
             $category->image = $filename;
         }
     
         $category->name  = $request->input('name');
         $category->slug  = $request->input('slug');
         $category->description  = $request->input('description');
         $category->status  = $request->input('status') == TRUE?'1': '0' ;
         $category->popular  = $request->input('popular') == TRUE?'1': '0' ;
         $category->meta_title = $request->input('meta_title');
         $category->meta_descrip = $request->input('meta_description');
         $category->meta_keywords = $request->input('meta_keywords');
         $category->save();
     
          return redirect('/dashboard')->with('status','Category Add New');
       
      }
      else
      {
         return redirect('/dashboard')->with('status','Category Existing');
      }

 
      

  

 }

 public function edit($id){
   $category = Category::find($id);
   return view('admin.category.edit-pro', compact('category'));
 }

 public function update(Request $request , $id){
   $category = Category::find($id);
   
   {
      $path = 'assets/uploads/category/' .$category->image;
      if(File::exists($path))
      {
         File::delete($path);
      }  
      $file = $request->file('image');
      $ext = $file->getClientOriginalExtension();
      $filename = time(). '.' .$ext;
      $file->move('assets/uploads/category' , $filename);
      $category->image = $filename;
   }
   $category->name  = $request->input('name');
   $category->slug  = $request->input('slug');
   $category->description  = $request->input('description');
   $category->status  = $request->input('status') == TRUE ? '1' : '0' ;
   $category->popular  = $request->input('popular') == TRUE ? '1': '0' ;
   $category->meta_title = $request->input('meta_title');
   $category->meta_descrip = $request->input('meta_description');
   $category->meta_keywords = $request->input('meta_keywords');
   $category->update();

   return redirect('/dashboard')->with('status',"Category Update Successfully");
 }

 public function destroy($id){

   $product = Product::find($id);
   $category = Category::find($id);
   if($category->image){
      $path = 'assets/uploads/category/' .$category->image;
      if(File::exists($path))
      {
         File::delete($path);
      }
   }
   
   // $product = DB::table('products')->where('cate_id',$id)->delete();
   $category->deleteall()->delete();
   $category->delete();


   return redirect('categories')->with('status',"Category Deleted Successfully");
 }




}
