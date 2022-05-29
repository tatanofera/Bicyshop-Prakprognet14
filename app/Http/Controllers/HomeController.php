<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_categories;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array('title' => 'Home');
        $products = Product::all();
        $product_categories = Product_categories::all();
        return view('homepage.index', $data, compact('products', 'product_categories'));
        // $data = array('title' => 'Home');
        // $products = Product::all();
        // return view('homepage.index', $data, compact('products'));
        //$notification = auth()->user()->unReadNotifications;
        // dd($notification);
    }
}
