<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Product;
use App\Category;
use App\Advertisement;
use App\User;
class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $advertisements = Advertisement::all();
        $contacts = Contact::all();
        $products = Product::all();
        return view('admin.home.index',compact('users','categories','advertisements','contacts','products'));
    }
    public function profile($id)
    {
        $user = User::find($id);
        $products = Product::where('user_id',$user->id)->paginate(12);
        return view('admin.profile.profile',compact('user','products'));
    }
    public function changeProfileImage(Request $request,$id)
    {
        
        $this->validate($request,[
            'profile-image' =>  'image'
        ]);
        if($request->hasFile('profile-image'))
        {
            $fileNameWithExtension = $request->file('profile-image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('profile-image')->storeAs('public/storage/uploads/images/users',$fileNameToStore);
        }
        $user = User::find($id);
        if($request->hasFile('profile-image'))
        {
            $user->image = $fileNameToStore;
            $user->save();
        }
        return redirect()->back();
    }
    public function changeBackGroundImage(Request $request,$id)
    {
        $this->validate($request,[
            'back-image' =>  'image'
        ]);
        if($request->hasFile('back-image'))
        {
            $fileNameWithExtension = $request->file('back-image')->getClientOriginalName();
            $fileName              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension             = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore       = $fileName . '_' . time() . '.' . $extension;
            $path                  = $request->file('back-image')->storeAs('public/storage/uploads/images/users',$fileNameToStore);
        }
        $user = User::find($id);
        if($request->hasFile('back-image'))
        {
            $user->backimage = $fileNameToStore;
            $user->save();
        }
        return redirect()->back();
    }
}
