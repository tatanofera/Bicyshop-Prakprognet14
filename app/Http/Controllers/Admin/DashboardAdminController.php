<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Product_categories;
use App\Models\Product_category_details;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DashboardAdminController extends Controller
{

    public function product()
    {
        $page = "Product";
        $products = Product::orderBy('id', 'Asc')->paginate(5);
        // $barangs = Barang::orderBy('id', 'Asc')->paginate(5);
        Paginator::useBootstrap();
        // return view('admin.product', compact('barangs', 'page'))->with('barang_aktif', 'active');
        return view('admin.product.product', compact('products', 'page'))->with('product_active', 'active');
    }

    public function courier()
    {
        $page = "Courier";
        $couriers = Courier::orderBy('id', 'Asc')->paginate(5);
        Paginator::useBootstrap();
        return view('admin.courier.courier', compact('couriers', 'page'))->with('courier_active', 'active');
    }

    public function product_categories()
    {
        $page = "Product Categories";
        $product_categories = Product_categories::orderBy('id', 'Asc')->paginate(5);
        Paginator::useBootstrap();
        return view('admin.product_categories.product-categories', compact('product_categories', 'page'))->with('product_categories_active', 'active');
    }

    public function discount()
    {
        $page = "Discount";
        $discounts = Discount::orderBy('id', 'Asc')->paginate(5);
        Paginator::useBootstrap();
        return view('admin.discount.discount', compact('discounts', 'page'))->with('discount_active', 'active');
    }
}
