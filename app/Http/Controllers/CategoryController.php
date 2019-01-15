<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories',$categories);
    }
    public function create()
    {
        return view('admin.categories.add');
    }
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name                 = $request->name;
        $category->description          = $request->description;
        $category->allow_comment        = $request->allow_comment;
        $category->allow_advertisement  = $request->allow_advertisement;
        $category->user_id              = Auth::user()->id;
        $category->save();
        return redirect()->back()->with('flash','Category Added Successfully');
    }
    public function edit($id)
    {
        # code...
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category',$category);
    }
    public function update(CategoryRequest $request,$id)
    {
        $this->validate($request,[
            'name' =>[
                Rule::unique('categories')->ignore($id),
            ]
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->allow_comment = $request->allow_comment;
        $category->allow_advertisement = $request->allow_advertisement;                
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->back()->with('flash','Category Updated Successfully');
    }
    public function destroy($id)
    {
        # code...
        Category::destroy($id);
        return redirect()->back()->with('flash','Categroy Deleted Successfully');   
    }
    public function approve($id)
    {
        $category = Category::find($id);
        if($category->approve == 1)
        {
            return redirect()->back()->with('error','Category Is Already Aprroved !');           
        }
        $category->approve = 1;
        $category->save();
        return redirect()->back()->with('flash','Category Approved Successfully');        
        
    }
    public function disable($id)
    {
        $category = Category::find($id);
        if($category->approve == 0)
        {
            return redirect()->back()->with('error','Category Is Already Disabled !');           
        }
        $category->approve = 0;
        $category->save();
        return redirect()->back()->with('flash','Category Disabled Successfully');        
        
    }
}
