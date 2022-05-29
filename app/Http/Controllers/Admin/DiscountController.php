<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Pagination\Paginator;

class DiscountController extends Controller
{
    public function discount_add()
    {
        $page = "Discount / Add";
        $products = Product::all();
        return view('admin.discount.discount-add', compact('products', 'page'))->with('discount_active', 'active');
    }

    public function discount_add_submit(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $add_discount = array(
            'product_id' => $request->product_id,
            'percentage' => $request->percentage,
            'start' => $request->start,
            'end' => $request->end
        );

        Discount::create($add_discount);

        return redirect()->route('discount-add')->with(['success' => 'Input data berhasil dilakukan']);
    }

    // public function discount_add()
    // {
    //     $page = "Discount / Add";
    //     $products = Product::all();
    //     return view('admin.discount.discount-add', compact('products', 'page'))->with('discount_active', 'active');
    // }

    // public function discount_add_submit(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required',
    //         'percentage' => 'required|numeric|min:0|max:100',
    //         'start' => 'required|date',
    //         'end' => 'required|date'
    //     ]);

    //     $add_discount = array(
    //         'product_id' => $request->product_id,
    //         'percentage' => $request->percentage,
    //         'start' => $request->start,
    //         'end' => $request->end
    //     );

    //     Discount::create($add_discount);

    //     $product = Product::where('id', '=', $request->product_id)->first();
    //     $hrg_product_lama = $product->price;

    //     $percentage_discount = $request->percentage;
    //     $diskon = ($hrg_product_lama * ($percentage_discount / 100));

    //     $product->price = ($hrg_product_lama - $diskon);
    //     $product->save();

    //     return redirect()->route('discount-add')->with(['success' => 'Input data berhasil dilakukan']);
    // }

    public function discount_edit($id)
    {
        $page = "Discount / Edit";
        $discounts = Discount::find($id);
        $products = Product::all();
        return view('admin.discount.discount-edit', compact('discounts', 'products', 'page'))->with('discount_active', 'active');
    }

    public function discount_edit_submit(Request $request, $id)
    {
        $discount = Discount::find($id);
        $product = Product::where('id', '=', $discount->product_id)->first();

        $request->validate([
            'percentage' => 'required|numeric|min:0|max:100',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $discount->product_id = $product->id;
        $discount->percentage = $request->percentage;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();

        return redirect()->route('discount-edit', $discount->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    }

    // public function discount_edit_submit(Request $request, $id)
    // {
    //     $discount = Discount::find($id);
    //     $product = Product::where('id', '=', $discount->product_id)->first();

    //     if ($discount->percentage != 0) {
    //         $old_diskon = $discount->percentage;
    //         $harga_stlh_diskon = $product->price;
    //         $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));
    //     } else {
    //         $harga_sblm_diskon = $product->price;
    //     }

    //     $request->validate([
    //         // 'product_id' => 'required',
    //         'percentage' => 'required|numeric|min:0|max:100',
    //         'start' => 'required|date',
    //         'end' => 'required|date'
    //     ]);

    //     $discount->product_id = $product->id;
    //     $discount->percentage = $request->percentage;
    //     $discount->start = $request->start;
    //     $discount->end = $request->end;
    //     $discount->save();

    //     $percentage_new = $discount->percentage;
    //     $diskon = $harga_sblm_diskon * ($percentage_new / 100);
    //     $harga_stlh_new_diskon = $harga_sblm_diskon - $diskon;
    //     $product->price = $harga_stlh_new_diskon;
    //     $product->save();

    //     return redirect()->route('discount-edit', $discount->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    // }

    public function discount_delete($id)
    {
        $discount = Discount::find($id);
        $product = Product::where('id', '=', $discount->product_id)->first();

        if ($discount->count() > 0) {
            $discount->delete();
            return back()->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus']);
        } else {
            $discount->delete();
            return back()->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus']);
        }
        return redirect()->route('discount')->with('discount_active', 'active');
    }

    // public function discount_delete($id)
    // {
    //     $discount = Discount::find($id);
    //     $product = Product::where('id', '=', $discount->product_id)->first();

    //     $harga_stlh_diskon = $product->price;
    //     $old_diskon = $discount->percentage;
    //     $harga_sblm_diskon = $harga_stlh_diskon * (100 / (100 - $old_diskon));

    //     if ($discount->count() > 0) {
    //         $discount->delete();
    //         $product->price = $harga_sblm_diskon;
    //         $product->save();
    //         return back()->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus']);
    //     } else {
    //         $discount->delete();
    //         $product->price = $harga_sblm_diskon;
    //         $product->save();
    //         return back()->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus']);
    //     }
    //     return redirect()->route('discount')->with('discount_active', 'active');
    // }

    public function discount_trash()
    {
        $page = "Discount / Trash";
        $discounts = Discount::onlyTrashed()->get();
        // $product = Product::onlyTrashed()->where('id', '=', $discounts->product_id)->first();

        return view('admin.discount.discount-trash', compact('discounts', 'page'))->with('discount_active', 'active');
    }

    public function discount_restore($id = null)
    {
        $discount = Discount::onlyTrashed()->where('id', '=', $id)->first();

        Discount::onlyTrashed()->where('id', $id)->restore();

        return redirect()->route('discount-trash')->with('discount_active', 'active')->with(['success' => 'Data berhasil dikembalikan']);
    }

    // public function discount_restore($id = null)
    // {
    //     $discount = Discount::onlyTrashed()->where('id', '=', $id)->first();
    //     $product = Product::where('id', '=', $discount->product_id)->first();
    //     $hrg_product_lama = $product->price;

    //     $percentage_discount = $discount->percentage;
    //     $diskon = ($hrg_product_lama * ($percentage_discount / 100));

    //     $product->price = ($hrg_product_lama - $diskon);
    //     $product->save();

    //     Discount::onlyTrashed()->where('id', $id)->restore();

    //     return redirect()->route('discount-trash')->with('discount_active', 'active')->with(['success' => 'Data berhasil dikembalikan']);
    // }

    public function discount_delete_permanently($id = null)
    {
        Discount::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('discount-trash')->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus permanent']);
    }
}
