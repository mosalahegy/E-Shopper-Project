<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlists = Wishlist::where('user_id',Auth::user()->id)->paginate(4);
        $products = Product::all();
        return view('wishlist',compact('wishlists','products'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        $wishlist = new Wishlist();
        $wishlist->product_id   =   $product->id;
        $wishlist->user_id      =   Auth::user()->id;
        $wishlist->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        Wishlist::destroy($id);
        return redirect()->back();
    }
}
