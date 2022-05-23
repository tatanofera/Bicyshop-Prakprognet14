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
use Carbon\Carbon;

class DashboardAdminController extends Controller
{

    public function product()
    {
        $page = "Product";
        $products = Product::orderBy('id', 'Asc')->paginate(5);
        $product_all = Product::all();
        Paginator::useBootstrap();

        foreach ($product_all as $product) {
            $tanggal = Carbon::now()->format('Y-m-d');
            $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
            if (!empty($discounts)) {
                foreach ($discounts as $discount) {
                    $harga_stlh_diskon = $product->price;
                    $old_diskon = $discount->percentage;
                    $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
                    $product->price = $harga_sblm_diskon;

                    $product->save();
                    $discount->delete();
                    Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                }
            }
        }
        return view('admin.product.product', compact('products', 'page'))->with('product_active', 'active');
    }

    public function courier()
    {
        $page = "Courier";
        $couriers = Courier::orderBy('id', 'Asc')->paginate(5);
        $product_all = Product::all();
        Paginator::useBootstrap();

        foreach ($product_all as $product) {
            $tanggal = Carbon::now()->format('Y-m-d');
            $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
            if (!empty($discounts)) {
                foreach ($discounts as $discount) {
                    $harga_stlh_diskon = $product->price;
                    $old_diskon = $discount->percentage;
                    $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
                    $product->price = $harga_sblm_diskon;

                    $product->save();
                    $discount->delete();
                    Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                }
            }
        }
        return view('admin.courier.courier', compact('couriers', 'page'))->with('courier_active', 'active');
    }

    public function product_categories()
    {
        $page = "Product Categories";
        $product_categories = Product_categories::orderBy('id', 'Asc')->paginate(5);
        $product_all = Product::all();
        Paginator::useBootstrap();

        foreach ($product_all as $product) {
            $tanggal = Carbon::now()->format('Y-m-d');
            $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
            if (!empty($discounts)) {
                foreach ($discounts as $discount) {
                    $harga_stlh_diskon = $product->price;
                    $old_diskon = $discount->percentage;
                    $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
                    $product->price = $harga_sblm_diskon;

                    $product->save();
                    $discount->delete();
                    Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                }
            }
        }
        return view('admin.product_categories.product-categories', compact('product_categories', 'page'))->with('product_categories_active', 'active');
    }

    public function discount()
    {
        $page = "Discount";
        $discounts = Discount::orderBy('id', 'Asc')->paginate(5);
        $products = Product::all();
        Paginator::useBootstrap();

        foreach ($products as $product) {
            $tanggal = Carbon::now()->format('Y-m-d');
            $discount_checks = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
            if (!empty($discount_checks)) {
                foreach ($discount_checks as $discount_check) {
                    $harga_stlh_diskon = $product->price;
                    $old_diskon = $discount_check->percentage;
                    $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
                    $product->price = $harga_sblm_diskon;

                    $product->save();
                    $discount_check->delete();
                    Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                }
            }
        }
        return view('admin.discount.discount', compact('discounts', 'page'))->with('discount_active', 'active');
    }
}
