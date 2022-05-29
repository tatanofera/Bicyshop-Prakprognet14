<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Product_categories;
use Illuminate\Support\Carbon;
use App\Models\Transaction;

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

        $now = Carbon::now();
        $transaksi_tahunan = Transaction::where('status', 'success')->whereYear('created_at', $now->year)->count();

        return view('admin.dashboard-new', compact('page', 'daftar_produk', 'daftar_kategori', 'daftar_diskon', 'daftar_kurir', 'transaksi_tahunan'))->with('dashboard_active', 'active', 'transaction');

        // $data_transaction = \DB::select('SELECT MONTH(updated_at) AS bulan,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "Sampai di tujuan" AND YEAR(updated_at)="2022" GROUP BY YEAR(updated_at), MONTH(updated_at)');
        // $transaction = json_encode($data_transaction);

        // return view('admin.dashboard-new', compact('page', 'daftar_produk', 'daftar_kategori', 'daftar_diskon', 'daftar_kurir'))->with('dashboard_active', 'active', 'transaction');
        // return view('admin.dashboard-new', $data, compact('page'))->with('dashboard_active', 'active');
    }

    public function getTransaksi()
    {
        $data_transaction = \DB::select('SELECT MONTH(updated_at) AS bulan,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "success" AND YEAR(updated_at)="2022" GROUP BY YEAR(updated_at), MONTH(updated_at)');
        $transaction = json_encode($data_transaction);

        return $transaction;
    }
}
