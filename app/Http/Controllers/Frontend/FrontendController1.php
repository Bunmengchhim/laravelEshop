<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

class FrontendController1 extends Controller
{
    public function index(){
        $feater_product = Product::where('trending', '1')->take(15)->get();
        $trending_product = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('feater_product','trending_product'));
    }
    public function category(){
        $category = Category::where('status','0')->get(); 
    
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug){

        if(Category::where('slug', $slug)->exists())
        { 
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','product'));
        }
        else
        {
            return redirect('/')->with('status',"Slug Does Not Exits");
        }
    }

    public function productview($cate_slug,$prod_slug){

        if(Category::where('slug', $cate_slug)->exists())
        { 
            if(Product::where('slug', $prod_slug)->exists())
            {
                 $product = Product::where('slug', $prod_slug)->first();
                 return view('frontend.products.view',compact('product'));
            }
            else
            {
                return redirect('/')->with('status',"No Category Found");
            }
        }

    }

   

}
