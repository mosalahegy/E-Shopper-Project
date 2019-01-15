<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;
use App\Product;
use App\Category;
use App\Advertisement;
use App\Brand;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }
    
    public function create()
    {
        return view('admin.users.add');
    }

    public function store(UserRequest $request)
    {   
        if($request->hasFile('image'))
        {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = pathinfo($fileNameWithExtension, PATHINFO_EXTENSION);
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/storage/uploads/images/users',$fileNameToStore);
        }
        $user = new User();
        $user->fill(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password),]);
        if($request->hasFile('image'))
            $user->image = $fileNameToStore;
        $user->approve = $request->approve;
        $user->isAdmin = $request->isAdmin;
        $user->save();
        return redirect()->back()->with('flash','User Added Successfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }
    public function update(UserRequest $request,$id)
    {
        $this->validate($request,[
            'email' =>[
                Rule::unique('users')->ignore($id),
            ]
        ]);
        if($request->hasFile('image'))
        {
            $fileNameWithExtension  = $request->file('image')->getClientOriginalName();
            $fileName               = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension              = pathinfo($fileNameWithExtension,PATHINFO_EXTENSION);
            $fileNameToStore        = $fileName . '_' . time() . '.' . $extension;
            $path                   = $request->file('image')->storeAs('public/storage/uploads/images/users' , $fileNameToStore);
        }
        $user = User::find($id);
        $user->fill(['name'=>$request->name,
                     'email'=>$request->email,
                     'password'=>bcrypt($request->password),
                    ]);
        if($request->hasFile('image'))
            $user->image = $fileNameToStore;
        $user->approve = $request->approve;
        $user->isAdmin = $request->isAdmin;
        $user->save();
        Auth::loginUsingId($id);
        return redirect()->back()->with('flash','User Updated Successfully');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('flash','User Deleted Successfully');
    }

    public function approve($id)
    {
        $user = User::find($id);
        if($user->approve == 1)
        {
            return redirect()->back()->with('error','User Is Already Aprroved !');           
        }
        $user->approve = 1;
        $user->save();
        return redirect()->back()->with('flash','User Approved Successfully'); 
    }
    public function disable($id)
    {
        $user = User::find($id);
        if($user->approve == 0)
        {
            return redirect()->back()->with('error','User Is Already Disabled !');           
        }
        $user->approve = 0;
        $user->save();
        return redirect()->back()->with('flash','User Disabled Successfully');        
        
    }

    public function profile($id)
    {
        $user = User::find($id);
        $products = Product::where('user_id',$user->id)->paginate(12);
        $categories = Category::all();
        $brands = Brand::all();
        $advertisements = Advertisement::all()->take(1);
        return view('profile',compact('user','products','categories','brands','advertisements'));
    }
    public function logout(Request $request)
    {
        /*$request->session()->flush();
        return redirect('login');*/
        Auth::logout();
        return redirect('/');
    }

}
