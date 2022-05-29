<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $data = array('title' => 'Home');
        $user = Auth::user();
        $carts = Cart::where([['user_id','=', $user->id],['status','=','aktif']])->get();

        return view('user.cart', $data, compact('carts'));
    }

    public function store(Request $request)
    {
        $product= Product::find($request->cart_product_id);
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['product_id','=',$request->cart_product_id],['status','=','aktif']])->get();
        if(count($carts)==0){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $request->cart_product_id; 
            $cart->qty = 1;
            $cart->status = "aktif";
            $cart->save();  
        }else{  
            foreach($carts as $cart){
                $temp = new Cart;
                $temp = Cart::where('id','=',$cart->id)->increment('qty', 1);
            }  
        }
        return back();
        // return view('homepage.index', $data, compact('products'));
    }

    public function delete($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return back();
    }

    
}
