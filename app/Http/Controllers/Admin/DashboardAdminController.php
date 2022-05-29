<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product_categories;
use App\Models\Product_review;
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
        //$product_review = Product_review::all();
        //$avgRate = Product_review::avg('rate')->where('product_id', '=', $product->id);
        Paginator::useBootstrap();

        foreach ($product_all as $product) {
            $tanggal = Carbon::now()->format('Y-m-d');
            $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
            if (!empty($discounts)) {
                foreach ($discounts as $discount) {
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
                    $discount_check->delete();
                    Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                }
            }
        }
        return view('admin.discount.discount', compact('discounts', 'page'))->with('discount_active', 'active');
    }


    // public function product()
    // {
    //     $page = "Product";
    //     $products = Product::orderBy('id', 'Asc')->paginate(5);
    //     $product_all = Product::all();
    //     Paginator::useBootstrap();

    //     foreach ($product_all as $product) {
    //         $tanggal = Carbon::now()->format('Y-m-d');
    //         $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
    //         if (!empty($discounts)) {
    //             foreach ($discounts as $discount) {
    //                 $harga_stlh_diskon = $product->price;
    //                 $old_diskon = $discount->percentage;
    //                 $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
    //                 $product->price = $harga_sblm_diskon;

    //                 $product->save();
    //                 $discount->delete();
    //                 Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
    //             }
    //         }
    //     }
    //     return view('admin.product.product', compact('products', 'page'))->with('product_active', 'active');
    // }

    // public function courier()
    // {
    //     $page = "Courier";
    //     $couriers = Courier::orderBy('id', 'Asc')->paginate(5);
    //     $product_all = Product::all();
    //     Paginator::useBootstrap();

    //     foreach ($product_all as $product) {
    //         $tanggal = Carbon::now()->format('Y-m-d');
    //         $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
    //         if (!empty($discounts)) {
    //             foreach ($discounts as $discount) {
    //                 $harga_stlh_diskon = $product->price;
    //                 $old_diskon = $discount->percentage;
    //                 $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
    //                 $product->price = $harga_sblm_diskon;

    //                 $product->save();
    //                 $discount->delete();
    //                 Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
    //             }
    //         }
    //     }
    //     return view('admin.courier.courier', compact('couriers', 'page'))->with('courier_active', 'active');
    // }

    // public function product_categories()
    // {
    //     $page = "Product Categories";
    //     $product_categories = Product_categories::orderBy('id', 'Asc')->paginate(5);
    //     $product_all = Product::all();
    //     Paginator::useBootstrap();

    //     foreach ($product_all as $product) {
    //         $tanggal = Carbon::now()->format('Y-m-d');
    //         $discounts = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
    //         if (!empty($discounts)) {
    //             foreach ($discounts as $discount) {
    //                 $harga_stlh_diskon = $product->price;
    //                 $old_diskon = $discount->percentage;
    //                 $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
    //                 $product->price = $harga_sblm_diskon;

    //                 $product->save();
    //                 $discount->delete();
    //                 Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
    //             }
    //         }
    //     }
    //     return view('admin.product_categories.product-categories', compact('product_categories', 'page'))->with('product_categories_active', 'active');
    // }

    // public function discount()
    // {
    //     $page = "Discount";
    //     $discounts = Discount::orderBy('id', 'Asc')->paginate(5);
    //     $products = Product::all();
    //     Paginator::useBootstrap();

    //     foreach ($products as $product) {
    //         $tanggal = Carbon::now()->format('Y-m-d');
    //         $discount_checks = Discount::where('product_id', '=', $product->id)->where('end', '<', $tanggal)->get();
    //         if (!empty($discount_checks)) {
    //             foreach ($discount_checks as $discount_check) {
    //                 $harga_stlh_diskon = $product->price;
    //                 $old_diskon = $discount_check->percentage;
    //                 $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
    //                 $product->price = $harga_sblm_diskon;

    //                 $product->save();
    //                 $discount_check->delete();
    //                 Discount::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
    //             }
    //         }
    //     }
    //     return view('admin.discount.discount', compact('discounts', 'page'))->with('discount_active', 'active');
    // }

    public function productreview()
    {
        $data = array('title' => 'Home');
        $productrate = Product_review::all();
        return view('admin.product.productreview', $data)->with(compact('productrate'))->with('review_active', 'active');
    }

    public function balasreview($id)
    {
        $productreview = Product_review::find($id);
        $productrate = Product_review::all();

        //dd(Auth::user());

        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);

        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Review Berhasil Direspon',
            'id' => $productreview->product_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Review Berhasil Direspon',
            'id' => $productreview->product_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return view('admin.product.productbalasreview', ['productreview' => $productreview], compact('productrate'))->with('review_active', 'active');
    }

    public function addbalas(Request $request, $id)
    {

        $validate = $request->validate([
            'balasan' => ['required', 'min:3', 'max:120']
        ]);

        $balasreview = Product_review::find($id);

        $balasreview->balasan = $request->balasan;
        $balasreview->save();

        if ($balasreview) {
            return redirect()->route('productreview')->with('success', 'Data Berhasil di Perbaharui')->with('review_active', 'active');
        } else {
            return redirect()->route('balasreview', [$id])->with('error', 'Data Gagal di Perbaharui')->with('review_active', 'active');
        }
    }
}
