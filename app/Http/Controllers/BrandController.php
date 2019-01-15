<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Brand;
use App\Category;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    //
    public function index()
    {
        # code...
        $brands = Brand::all();
        return view('admin.brands.index')->with('brands',$brands);
    }
    public function create()
    {
        # code...
        $categories = Category::all();
        return view('admin.brands.add')->with('categories',$categories);
    }
    public function store(BrandRequest $request)
    {
        # code...
        $brand = new Brand();
        $brand->fill($request->all())->save();
        return redirect()->back()->with('flash','Brand Added Successfully');
    }
    public function edit($id)
    {
        # code...
        $brand = Brand::find($id);
        $categories = Category::all();
        return view('admin.brands.edit')->with('categories',$categories)->with('brand',$brand);
    }
    public function update(BrandRequest $request,$id)
    {
        # code...
        $brand = Brand::find($id);
        $brand->fill($request->all())->save();
        return redirect()->back()->with('flash','Brand Updated Successfully');
    }
    public function destroy($id)
    {
        # code...
        Brand::destroy($id);
        return redirect()->back()->with('flash','Brand Deleted Successfully');
    }
    public function approve($id)
    {
        $brand = Brand::find($id);
        if($brand->approve == 1)
        {
            return redirect()->back()->with('error','Brand Is Already Approved!');
        }
        $brand->approve = 1;
        $brand->save();
        return redirect()->back()->with('flash','Brand Approved Successfully');
    }
    public function disable($id)
    {
        $brand = Brand::find($id);
        if($brand->approve == 0)
        {
            return redirect()->back()->with('error','Brand Is Already Disabled!');
        }
        $brand->approve = 0;
        $brand->save();
        return redirect()->back()->with('flash','Brand Disabled Successfully');
    }
}
