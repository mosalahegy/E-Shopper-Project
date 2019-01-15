<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Slider;
class SliderController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index')->with('sliders',$sliders);
    }
    public function create()
    {
        return view('admin.sliders.add');

    }
    public function store(SliderRequest $request)
    {
        if($request->hasFile('image'))
        {
            $fileNameWithExtension  = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension  = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/storage/uploads/images/sliders',$fileNameToStore);
        }
        $slider = new Slider();
        $slider->fill(array_except($request->all(),['image']));
        if($request->hasFile('image'))
        {
            $slider->image  = $fileNameToStore;
        }
        $slider->save();
        return redirect()->back()->with('flash','Slider Added Successfully');
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit')->with('slider',$slider);
    }
    public function update(SliderRequest $request,$id)
    {   
        $slider = Slider::find($id);
        if($request->hasFile('image'))
        {
            $fileNameWithExtension  = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension  = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/storage/uploads/images/sliders',$fileNameToStore);
        }
        $slider->fill(array_except($request->all(),['image']));
        if($request->hasFile('image'))
        {
            $slider->image = $fileNameToStore;
        }
        $slider->save();
        return redirect()->back()->with('flash','Slider Upadated Successfully');
    }
    public function destroy($id)
    {
        Slider::destroy($id);
        return redirect()->back()->with('flash','Slider Deleted Successfully');
    }

    public function approve($id)
    {
        $slider = Slider::find($id);
        if($slider->approve == 1)
        {
            return redirect()->back()->with('error','Slider Is Already Approved!');
        }
        $slider->approve = 1;
        return redirect()->back()->with('flash','Slider Successfully Approved');
    }
    public function disable($id)
    {
        $slider = Slider::find($id);
        if($slider->approve == 0)
        {
            return redirect()->back()->with('error','Slider Is Already Disabled!');
        }
        $slider->approve = 0;
        return redirect()->back()->with('flash','Slider Successfully Disabled');
    }
}
