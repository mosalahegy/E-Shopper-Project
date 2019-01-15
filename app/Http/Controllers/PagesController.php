<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use App\Category;
use App\Brand;
use App\Product;
use App\Advertisement;


class PagesController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(6);
        
        $advertisements = Advertisement::all()->take(2);
        return view('welcome',compact('sliders','categories','brands','products','advertisements'));
    }
    public function products()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(9);
        $advertisements = Advertisement::all()->take(1);
        return view('products',compact('sliders','categories','brands','products','advertisements'));
    }
    public function productsDetails()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(9);
        $advertisements = Advertisement::all()->take(1);
        return view('products-details',compact('sliders','categories','brands','products','advertisements'));
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
        $products = Product::where('category_id',$product->category->id)->where('id','!=',$product->id)->get();
        $categories = Category::all();
        $advertisements = Advertisement::all()->take(1);
        $brands = Brand::all();
        return view('single',compact('product','products','categories','advertisements','brands'));
    }
    public function search(Request $request)
    {
        $items = $request->all();
        $products = DB::table("products")->get();
        foreach($items as $key => $item)
        {
            $products = $products->where($key,$item);
        }
        $categories = Category::all();
        $advertisements = Advertisement::all()->take(1);
        $brands = Brand::all();
        return view('search',compact('products','categories','advertisements','brands'));
    }
}
