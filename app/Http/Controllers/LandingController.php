<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Product_category_details;
use App\Models\Product_image;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landingpage()
    {
        $data = array('title' => 'Home');
        $products = Product::all();
        $product_categories = Product_categories::all();
        return view('homepage.landing', $data, compact('products', 'product_categories'));

        // $data = array('title' => 'Home');
        // $products = Product::all();
        // return view('homepage.landing', $data, compact('products'));
    }
}
