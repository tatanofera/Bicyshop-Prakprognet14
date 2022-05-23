<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Product_category_details;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function product_categories_add()
    {
        $page = "Product Categories / Add";
        return view('admin.product_categories.product-categories-add', compact('page'))->with('product_categories_active', 'active');
    }

    public function product_categories_add_submit(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:product_categories'
        ]);

        $add_category = array(
            'category_name' => $request->category_name
        );

        Product_categories::create($add_category);
        return redirect()->route('product-categories-add')->with(['success' => 'Input data berhasil dilakukan']);
    }

    public function product_categories_edit($id)
    {
        $page = "Product Categories / Edit";
        $product_category = Product_categories::find($id);
        return view('admin.product_categories.product-categories-edit', compact('product_category', 'page'))->with('product_categories_active', 'active');
    }

    public function product_categories_edit_submit(Request $request, $id)
    {
        $product_category = Product_categories::find($id);

        if ($request->category_name == $product_category->category_name) {
            $request->validate([
                'category_name' => 'required'
            ]);
        } else {
            $request->validate([
                'category_name' => 'required|unique:product_categories'
            ]);
        }

        $product_category->category_name = $request->category_name;
        $product_category->save();

        return redirect()->route('product-categories-edit', $product_category->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    }

    public function product_categories_delete($id)
    {
        $product_categories = Product_categories::find($id);
        $product_categories_details_cek = Product_category_details::where('category_id', '=', $product_categories->id)->count();
        // $product = Product::where('id', '=', $product_categories_details->product_id)->first();

        if ($product_categories_details_cek > 0) {
            $product_categories_details = Product_category_details::where('category_id', '=', $product_categories->id)->first();
            $product = Product::where('id', '=', $product_categories_details->product_id)->first();
            $product_categories_details->delete();
            $product->delete();
            $product_categories->delete();
            return back()->with(['success' => 'Data berhasil dihapus']);
        } else {
            $product_categories->delete();
            return back()->with(['success' => 'Data berhasil dihapus']);
        }
        return redirect()->route('product-categories');
    }

    public function product_categories_trash()
    {
        $page = "Product Categories / Trash";
        $product_categories = Product_categories::onlyTrashed()->get();
        // $product_categories_details = Product_category_details::onlyTrashed()->where('id', '=', $product_categories->id)->first();

        return view('admin.product_categories.product-categories-trash', compact('product_categories', 'page'))->with('product_categories_active', 'active');
    }

    public function product_categories_restore($id = null)
    {
        $product_categories = Product_categories::onlyTrashed()->where('id', '=', $id)->first();
        $product_categories_details_cek = Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->count();

        // Product_categories::onlyTrashed()->where('id', $id)->restore();
        // Product_category_details::onlyTrashed()->where('product_id', '=', $product_categories->id)->restore();
        // Product::onlyTrashed()->where('id', '=', $product_categories_details->product_id)->restore();

        if ($product_categories_details_cek > 0) {
            $product_categories_details = Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->first();
            Product_categories::onlyTrashed()->where('id', $id)->restore();
            Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->restore();
            Product::onlyTrashed()->where('id', '=', $product_categories_details->product_id)->restore();
            return back()->with(['success' => 'Data berhasil dikembalikan']);
        } else {
            Product_categories::onlyTrashed()->where('id', $id)->restore();
            return back()->with(['success' => 'Data berhasil dikembalikan']);
        }
        return redirect()->route('product-categories-trash')->with('product_categories_active', 'active')->with(['success' => 'Data berhasil dikembalikan']);
    }

    public function product_categories_delete_permanently($id = null)
    {
        $product_categories = Product_categories::onlyTrashed()->where('id', '=', $id)->first();
        $product_categories_details_cek = Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->count();

        // Product_categories::onlyTrashed()->where('id', $id)->restore();
        // Product_category_details::onlyTrashed()->where('product_id', '=', $product_categories->id)->restore();
        // Product::onlyTrashed()->where('id', '=', $product_categories_details->product_id)->restore();

        if ($product_categories_details_cek > 0) {
            $product_categories_details = Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->first();
            Product_categories::onlyTrashed()->where('id', $id)->forceDelete();
            Product_category_details::onlyTrashed()->where('category_id', '=', $product_categories->id)->forceDelete();
            Product::onlyTrashed()->where('id', '=', $product_categories_details->product_id)->forceDelete();
            return back()->with(['success' => 'Data berhasil dihapus permanent']);
        } else {
            Product_categories::onlyTrashed()->where('id', $id)->forceDelete();
            return back()->with(['success' => 'Data berhasil dihapus permanent']);
        }
        return redirect()->route('product-categories-trash')->with('product_categories_active', 'active')->with(['success' => 'Data berhasil dihapus permanent']);

        // Discount::onlyTrashed()->where('id', $id)->forceDelete();
        // return redirect()->route('discount-trash')->with('discount_active', 'active')->with(['success' => 'Data berhasil dihapus permanent']);
    }
}
