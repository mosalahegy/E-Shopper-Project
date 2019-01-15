<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Http\Requests\AdvertisementRequest;



class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('admin.advertisements.index',compact('advertisements'));

    }
    public function create()
    {
        return view('admin.advertisements.add');
    }
    public function store(AdvertisementRequest $request)
    {
        $advertisement = new Advertisement();
        if($request->hasFile('image'))
        {
            $fileNameWithExtension  = $request->file('image')->getClientOriginalName();
            $fileName               = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension              = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore        = $fileName . '_' . time() . '.' . $extension;
            $path                   = $request->file('image')->storeAs('public/storage/uploads/images/advertisements',$fileNameToStore);
        }   
        if($request->hasFile('image'))
        {
            $advertisement->image = $fileNameToStore;
        }
        $advertisement->fill(array_except($request->all(),['image']))->save();
        return redirect()->back()->with('flash','Advertisement Added Successfully');
    }
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('admin.advertisements.edit',compact('advertisement'));        
    }
    public function update(AdvertisementRequest $request,$id)
    {
        $advertisement = Advertisement::find($id);
        if($request->hasFile('image'))
        {
            $fileNameWithExtension  = $request->file('image')->getClientOriginalName();
            $fileName               = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension              = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore        = $fileName . '_' . time() . '.' . $extension;
            $path                   = $request->file('image')->storeAs('public/storage/uploads/images/advertisements',$fileNameToStore);
        }   
        if($request->hasFile('image'))
        {
            $advertisement->image = $fileNameToStore;
        }
        $advertisement->fill(array_except($request->all(),['image']))->save();
        return redirect()->back()->with('flash','Advertisement Updated Successfully');
    }
    public function destroy($id)
    {
        Advertisement::destroy($id);
        return redirect()->back()->with('flash','Advertisement Deleted Successfully');           
    }
    public function approve($id)
    {
        $advertisement  =   Advertisement::find($id);
        if($advertisement->approve == 1)
        {
            return redirect()->back()->with('error','Advertisement Is Already Approved!');
        }
        $advertisement->approve = 1;
        $advertisement->save();
        return redirect()->back()->with('flash','Advertisement Approved Successfully');
    }
    public function disable($id)
    {
        $advertisement  =   Advertisement::find($id);
        if($advertisement->approve == 0)
        {
            return redirect()->back()->with('error','Advertisement Is Already Disabled!');
        }
        $advertisement->approve = 0;
        $advertisement->save();
        return redirect()->back()->with('flash','Advertisement Disabled Successfully');
    }
}
