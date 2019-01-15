<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with('products',$products);
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.add',compact('categories','brands'));
    }
    public function store(ProductRequest $request)
    {
        if($request->hasFile('productImage'))
        {
            $fileNameWithExtension  = $request->file('productImage')->getClientOriginalName();
            $fileName               = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension              = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore        = $fileName . '_' . time() . '.' . $extension;
            $path                   = $request->file('productImage')->storeAs('public/storage/uploads/images/products',$fileNameToStore);
        }
        $product = new Product();
        $product->fill(array_except($request->all(),['user_id','productImage']));
        if($request->hasFile('productImage'))
            $product->image = $fileNameToStore;
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect()->back()->with('flash','Product Added Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit',compact('categories','product','brands'));
    }

    public function update(ProductRequest $request,$id)
    {
        if($request->hasFile('productImage'))
        {
            $fileNameWithExtension = $request->file('productImage')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('productImage')->storeAs('public/storage/uploads/images/products',$fileNameToStore);
        }
        $product = Product::find($id);
        $product->fill(array_except($request->all(),['user_id','productImage']));
        if($request->hasFile('productImage'))
        {
            $product->image = $fileNameToStore;
        }
        $product->save();
        return redirect()->back()->with('flash','Product Updated Successfully');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('flash','Product Deleted Successfully');
    }
    public function approve($id)
    {
        $product = Product::find($id);
        if($product->approve == 1)
        {
            return redirect()->back()->with('error','Product Is Already Approved!');
        }
        $product->approve = 1;
        $product->save();
        return redirect()->back()->with('flash','Product Approved Successfully');
    }
    public function disable($id)
    {
        $product = Product::find($id);
        if($product->approve == 0)
        {
            return redirect()->back()->with('error','Product Is Already Disabled!');
        }
        $product->approve = 0;
        $product->save();
        return redirect()->back()->with('flash','Product Disabled Successfully');
    }
}
