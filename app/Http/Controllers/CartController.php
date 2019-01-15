<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $carts = Cart::where('user_id',Auth::user()->id)->paginate(4);
        $products = Product::all();
        return view('cart',compact('carts','products'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        $cart = new Cart();
        $cart->product_id   =   $product->id;
        $cart->user_id      =   Auth::user()->id;
        $cart->quantity     =   1;
        $cart->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
