<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\Product_review;
use App\Models\User;
use App\Models\Courier;
use App\Models\Response;
use App\Models\Admin;
use Auth;
use App\Models\Admin_notification;
use App\Models\User_notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $data = array('title' => 'Home');
        $carts = Cart::where([['user_id', '=', Auth::user()->id], ['status', '=', 'aktif']])->get();
        return view('user.chekout', $data)->with(compact('carts'));
    }

    public function admin()
    {
        $data = array('title' => 'Home');
        $transaksi = Transaction::all();
        return view('admin.transaction.transactionindex', $data)->with(compact('transaksi'))->with('transaction_active', 'active');
    }

    public function checkout_confirm(Request $request)
    {
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

        $i = 0;
        $carts = Cart::where([['user_id', '=', Auth::user()->id], ['status', '=', 'aktif']])->get();
        foreach ($carts as $dd) {

            $trx_detail = Transaction_detail::create([
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
            $i = $i + 1;
        }

        $transaksi_id = $transaksi->id;

        //dd(Auth::user());
        //Notif Admin
        $user = User::find($transaksi->user_id);
        $admin = Admin::find(1);

        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'melakukan transaksi!',
            'id' => $transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $user = User::find($transaksi->user_id);
        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'Upload bukti pembayaran!',
            'id' => $transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect()->route('cart.index')->with('success', "Anda telah berhasil melakukan checkout untuk pesanan Anda! Silahkan melakukan pembayaran sebeluh batas terakhir waktu pembayaran!!!");
    }

    public function transaksiindex()
    {
        $data = array('title' => 'Home');
        $user = Auth::user();
        $transaksis = Transaction::where('user_id', $user->id)->get();

        // return $transaksis;

        return view('user.transaksiindex', $data, compact('transaksis'));
    }

    public function transaksidetail($id)
    {
        $data = array('title' => 'Home');
        $user = Auth::user();
        $transaksis = Transaction::find($id);
        $detailtransaksis = Transaction_detail::where('transaction_id', $transaksis->id)->get();

        // return $transaksis;

        return view('user.transaksidetail', $data, compact('transaksis', 'detailtransaksis'));
    }

    public function uploadbukti($id, Request $request)
    {

        $gambar = $request->gambar;
        $name = 'produk_' . time() . '.' . $gambar->getClientOriginalExtension();
        $transaksi = Transaction::where('id', '=', $id)->first();
        $transaksi->proof_of_payment = $name;
        $transaksi->update();
        // storeAs('public/img', 'img'.$name, file_get_contents($request->file('gambar')));
        Storage::disk('asset')->put('assets/imagess/' . $name, file_get_contents($request->file('gambar')));

        $user = User::find($transaksi->user_id);
        $transaksi_id = $transaksi->id;
        $admin = Admin::find(1);

        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'mengupload bukti pembayaran!',
            'id' => $request->transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'Bukti pembayaran diupload!',
            'id' => $request->transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return back();
    }

    public function adminApprove($id)
    {
        Transaction::where('id', $id)
            ->update([
                'status' => 'admin_verified'
            ]);

        $transaction = Transaction::where('id', $id)->first();
        // // $transaction_detail = TransaksiDetail::where('transaction_id', $id)->get();
        // $user = User::find($transaction->user_id);

        // foreach ($transaction_detail as $detail) {
        //     $product = Product::where('id', $detail->product_id)->first();
        //     Product::where('id', $detail->product_id)
        //         ->update([
        //             'stock' => $product->stock - $detail->qty
        //     ]);
        // }

        $user_id = Auth::id();
        $user = User::find($user_id);

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan terverifikasi!',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan terverifikasi!',
            'id' => $id,
            'category' => 'approved'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        //return $transaction;
        return redirect('admin/transaction-list')->with('transaction_active', 'active');
    }

    public function adminDelivered($id)
    {

        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        Transaction::where('id', $id)
            ->update([
                'status' => 'delivered'
            ]);

        $user = User::find($transaksi->user_id);
        $transaksi_id = $transaksi->id;

        $admin = Admin::find(1);
        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'Pesanan Dikirim',
            'id' => $request->transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => Auth::user()->user_name,
            'message' => 'Pesanan Dikirim',
            'id' => $request->transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/transaksi/index')->with('transaction_active', 'active');
    }

    public function adminCanceled($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        Transaction::where('id', $id)
            ->update([
                'status' => 'canceled'
            ]);

        $user_id = Auth::id();
        $user = User::find($user_id);

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Dibatalkan',
            'id' => $id,
            'category' => 'canceled'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Dibatalkan',
            'id' => $id,
            'category' => 'canceled'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/admin/transaction-list')->with('transaction_active', 'active');
    }

    public function adminExpired($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        Transaction::where('id', $id)
            ->update([
                'status' => 'expired'
            ]);

        $user_id = Auth::id();
        $user = User::find($user_id);

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Expired',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Expired',
            'id' => $id,
            'category' => 'expired'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/admin/transaction-list');
    }

    public function transactionsTimeout($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        Transaction::where('id', $id)
            ->update([
                'status' => 'expired'
            ]);

        $user_id = Auth::id();
        $user = User::find($user_id);

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Expired',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Expired',
            'id' => $id,
            'category' => 'expired'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/admin/transaction-list');
    }

    public function userSuccess($id)
    {
        $transaksis = Transaction::where('id', $id)->first();
        $user = User::find($transaksis->user_id);

        Transaction::where('id', $id)
            ->update([
                'status' => 'success'
            ]);

        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Sukses',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Sukses',
            'id' => $id,
            'category' => 'success'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/transaksi/index');
    }

    public function userCanceled($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);

        Transaction::where('id', $id)
            ->update([
                'status' => 'admin_canceled'
            ]);


        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Dibatalkan',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Pesanan Dibatalkan',
            'id' => $id,
            'category' => 'canceled'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return redirect('/transaksi/index');
        // return $transaction;
    }

    public function form_review($id)
    {
        // $transaksi = Transaction::find($id);
        $transaksis = Transaction::with('transaction_detail', 'transaction_detail.product')->find($id);
        //$data = array('title' => 'Home');
        // $carts = Cart::where([['user_id', '=', Auth::user()->id], ['status', '=', 'aktif']])->get();
        //return view('user.review')->with(compact('transaksis'));
        return view('user.review', compact('transaksis'));
    }

    public function upload_review_user($id, Request $request)
    {
        $i = 0;
        $j = 0;
        $k = 0;
        foreach ($request->product_id as $pp) {
            foreach ($request->stars as $rate) {
                $temp = (int)$rate;
                foreach ($request->content as $content) {
                    if ($i == $j && $i == $k)
                        Product_review::create([
                            'product_id' => $pp,
                            'user_id' => Auth::user()->id,
                            'rate' => $temp,
                            'content' => $content,
                        ]);

                    $transaksi = Transaction::where('id', '=', $id)->first();
                    // $transaksi->is_review = 1;
                    $transaksi->update();
                    $k++;
                }
                $j++;
            }
            $i++;
        }

        $transaction = Transaction::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $admin = Admin::find(1);
        $data = [
            'nama' => $user->user_name,
            'message' => 'Review Berhasil Diunggah',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama' => $user->user_name,
            'message' => 'Review Berhasil Diunggah',
            'id' => $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return redirect('/transaksi/index');
    }

    public function adminDetail($id)
    {
        $transactions = Transaction::where('id', $id)->get();
        $transaksis = Transaction::find($id);
        return view('admin.product.transdetail', compact('transactions', 'id', 'transaksis'))->with('transaction_active', 'active');
    }
}
