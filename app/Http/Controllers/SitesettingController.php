<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitesetting;

class SitesettingController extends Controller
{
    //
    public function index()
    {
        $settings = Sitesetting::all();
        return view('admin.sitesettings.index')->with('settings',$settings);
    }
    public function create()
    {
        
        return view('admin.sitesettings.add');
    }
    public function store($id)
    {
        return view('admin.sitesettings.add');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        # code...
    }
    public function update(Request $request,$id)
    {
        # code...
    }
    public function destroy($id)
    {
        Sitesetting::destroy($id);
        return redirect()->back()->with('flash','Setting Deleted Successfully');
        # code...
    }
}
