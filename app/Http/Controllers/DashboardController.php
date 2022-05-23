<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Product_categories;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $page = "Dashboard";
        $data = array('title' => 'Dashboard');
        $daftar_produk = Product::count();
        if (!$daftar_produk) {
            $daftar_produk = 0;
        }

        $daftar_kategori = Product_categories::count();
        if (!$daftar_kategori) {
            $daftar_kategori = 0;
        }

        $daftar_diskon = Discount::count();
        if (!$daftar_diskon) {
            $daftar_diskon = 0;
        }

        $daftar_kurir = Courier::count();
        if (!$daftar_kurir) {
            $daftar_kurir = 0;
        }
        return view('admin.dashboard-new', compact('page', 'daftar_produk', 'daftar_kategori', 'daftar_diskon', 'daftar_kurir'))->with('dashboard_active', 'active');
        // return view('admin.dashboard-new', $data, compact('page'))->with('dashboard_active', 'active');
    }
}
