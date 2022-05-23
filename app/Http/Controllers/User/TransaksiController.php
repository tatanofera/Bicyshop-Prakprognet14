<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product_review;
use App\Models\User;
use App\Models\Courier;
use App\Models\Response;
use Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    //
    public function index(){
        $data = array('title' => 'Home');
        $carts = Cart::where([['user_id', '=', Auth::user()->id], ['status', '=', 'aktif']])->get();
        return view('user.chekout',$data)->with(compact('carts'));
    }

    public function checkout_confirm(Request $request){
        $request->validate([
            "address" => "required",
            "regency" => "required",
            "province" => "required",
            "total" => "required|numeric",
            "shipping_cost" => "required",
            "sub_total" => "required",
            "courier_id" => "required",
            // 'products' => "required",
        ]);
        $date = Carbon::now('Asia/Makassar');
        
        $timeout = $date->addHours(24);
        $transaksi = Transaction::create([
            'timeout' => $timeout,
            'address' => $request->address,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
            'sub_total' => $request->sub_total,
            'user_id' => Auth::user()->id,
            'courier_id' => $request->courier_id,
            'proof_of_payment' => NULL,
            'status' => 'unpaid',
        ]);
        $i=0;
        $carts = Cart::where([['user_id', '=', Auth::user()->id], ['status', '=', 'aktif']])->get();
        foreach($carts as $dd){

            $trx_detail = TransactionDetail::create([
                'transaction_id' => $transaksi->id,
                'product_id' => $dd->product->id,
                'qty' => $dd->qty,
                'discount_id' => NULL,
                'selling_price' => $dd->product->price
            ]);

            Cart::where('product_id', $dd->product->id)->where('user_id', Auth::user()->id)->where('status', 'aktif')
                ->update([
                    'status' => 'checkout'
                ]);
            $i = $i+1;
        }



        return redirect()->route('cart.index')->with('success', "Anda telah berhasil melakukan checkout untuk pesanan Anda! Silahkan melakukan pembayaran sebeluh batas terakhir waktu pembayaran!!!");
    }
}
