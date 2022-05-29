<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Product_category_details;
use App\Models\Product_image;
use App\Models\Product_review;
use Illuminate\Pagination\Paginator;


class ProductController extends Controller
{
    public function product_add()
    {
        $page = "Product / Add";
        $categories = Product_categories::all();
        return view('admin.product.product-add', compact('categories', 'page'))->with('product_active', 'active');
    }

    // public function product_add_submit(Request $request)
    // {
    //     $product = $request->validate([
    //         'product_name' => 'required|unique:products',
    //         'category_id' => 'required|numeric',
    //         'price' => 'required|numeric|min:0',
    //         'description' => 'required',
    //         'stock' => 'required|numeric|min:0',
    //         'weight' => 'required|numeric|min:0',
    //         'image_name.*' => 'required|image|file||max:4096'
    //     ]);

    //     $product['image_name'] = $request->file('image_name')->store('image_name', ['disk' => 'public']);

    //     $tambah_product = array(
    //         'product_name' => $request->product_name,
    //         'price' => $request->price,
    //         'product_rate' => 0,
    //         'description' => $request->description,
    //         'stock' => $request->stock,
    //         'weight' => $request->weight
    //     );

    //     Product::create($tambah_product);

    //     $product_id = Product::orderBy('id', 'desc')->first();
    //     // dd($product_id);
    //     $tambah_product_image = array(
    //         'product_id' => $product_id->id,
    //         'image_name' => $product['image_name']
    //     );

    //     $tambah_product_category_detail = array(
    //         'product_id' => $product_id->id,
    //         'category_id' => $request->category_id
    //     );

    //     Product_image::create($tambah_product_image);
    //     Product_category_details::create($tambah_product_category_detail);

    //     return redirect()->route('product-add')->with(['success' => 'Input data berhasil dilakukan']);
    // }

    public function product_add_submit(Request $request)
    {
        if ($request->image_name) {
            $request->validate([
                'product_name' => 'required|unique:products',
                'category_id' => 'required|numeric',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'stock' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'image_name.*' => 'image|file||max:4096'
            ]);

            // $product['image_name'] = $request->file('image_name')->store('image_name', ['disk' => 'public']);

            $tambah_product = array(
                'product_name' => $request->product_name,
                'price' => $request->price,
                'product_rate' => 0,
                'description' => $request->description,
                'stock' => $request->stock,
                'weight' => $request->weight
            );

            Product::create($tambah_product);

            $product = Product::orderBy('id', 'desc')->first();

            if ($request->hasFile('image_name')) {
                foreach ($request->file('image_name') as $key => $file) {
                    $image_name = $file->store('image_name', ['disk' => 'public']);
                    $product_id = $product->id;

                    $insert[$key]['product_id'] = $product_id;
                    $insert[$key]['image_name'] = $image_name;
                    $insert[$key]['created_at'] = Carbon::now();
                    $insert[$key]['updated_at'] = Carbon::now();
                }

                Product_image::insert($insert);
            }

            $tambah_product_category_detail = array(
                'product_id' => $product->id,
                'category_id' => $request->category_id
            );

            Product_category_details::create($tambah_product_category_detail);

            return redirect()->route('product-add')->with(['success' => 'Input data berhasil dilakukan']);
        } else {
            $request->validate([
                'product_name' => 'required|unique:products',
                'category_id' => 'required|numeric',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'stock' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
            ]);

            $tambah_product = array(
                'product_name' => $request->product_name,
                'price' => $request->price,
                'product_rate' => 0,
                'description' => $request->description,
                'stock' => $request->stock,
                'weight' => $request->weight
            );
            Product::create($tambah_product);

            $product = Product::orderBy('id', 'desc')->first();
            $tambah_product_category_detail = array(
                'product_id' => $product->id,
                'category_id' => $request->category_id
            );

            Product_category_details::create($tambah_product_category_detail);

            return redirect()->route('product-add')->with(['success' => 'Input data berhasil dilakukan']);
        }
    }

    public function product_detail($id)
    {
        $page = "Product / Detail";
        $products = Product::find($id);
        $product_images = Product_image::where('product_id', '=', $products->id)->get();
        $count_product_images = $product_images->count();
        $products_review = Product_review::all();
        // $avgRate = Product_review::select('rate')->where('product_id', '=', $id)->get();
        // $avgRate = Product_review::avg('rate', '=', $products->$id)
        $avgRate = Product_review::where('product_id', '=', $id)->avg('rate');
        // $avgRate = avg('rate');
        $det_categories = Product_category_details::where('product_id', '=', $products->id)->first();
        $categories = Product_categories::all();

        // return view('admin.product.product-detail', compact('products', 'product_images', 'det_categories'));
        $discount = Discount::where('product_id', '=', $products->id)->first();
        Paginator::useBootstrap();

        if ($discount == null) {
            return view('admin.product.product-detail', compact('products', 'product_images', 'count_product_images', 'det_categories', 'categories', 'discount', 'page', 'avgRate'))->with('discount', 'active')->with('product_active', 'active');
            // return view('admin.product.product-edit', compact('products', 'product_images', 'categories', 'det_categories', 'discount'))->with('discount', 'active');
        } else {
            $discounts = Discount::where('product_id', '=', $products->id)->paginate(5);
            return view('admin.product.product-detail', compact('products', 'product_images', 'count_product_images', 'det_categories', 'categories', 'discounts', 'page', 'avgRate'))->with('product_active', 'active');
            // return view('admin.product.product-edit', compact('products', 'product_images', 'categories', 'det_categories', 'discounts'));
        }
    }

    public function product_edit($id)
    {
        $page = "Product / Edit";
        $products = Product::find($id);
        $product_images = Product_image::where('product_id', '=', $products->id)->get();
        $categories = Product_categories::all();
        $det_categories = Product_category_details::where('product_id', '=', $products->id)->first();

        $discount = Discount::where('product_id', '=', $products->id)->first();
        Paginator::useBootstrap();

        if ($discount == null) {
            return view('admin.product.product-edit', compact('products', 'product_images', 'categories', 'det_categories', 'discount', 'page'))->with('discount', 'active')->with('product_active', 'active');
        } else {
            $discounts = Discount::where('product_id', '=', $products->id)->paginate(5);
            return view('admin.product.product-edit', compact('products', 'product_images', 'categories', 'det_categories', 'discounts', 'page'))->with('product_active', 'active');
        }
    }

    public function product_edit_submit(Request $request, $id)
    {
        $product = Product::find($id);
        // $product_images = Product_image::where('product_id', '=', $product->id)->first();
        $det_categories = Product_category_details::where('product_id', '=', $product->id)->first();

        if ($request->product_name == $product->product_name) {
            if ($request->image_name) {
                $request->validate([
                    'product_name' => 'required',
                    'category_id' => 'required|numeric',
                    'price' => 'required|numeric|min:0',
                    'description' => 'required',
                    'stock' => 'required|numeric|min:0',
                    'weight' => 'required|numeric|min:0',
                    'image_name.*' => 'image|file||max:4096'
                ]);
            }
            $request->validate([
                'product_name' => 'required',
                'category_id' => 'required|numeric',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'stock' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'image_name.*' => 'image|file||max:4096'
            ]);

            if ($request->hasFile('image_name')) {
                foreach ($request->file('image_name') as $key => $file) {
                    $image_name = $file->store('image_name', ['disk' => 'public']);
                    $product_id = $product->id;

                    $insert[$key]['product_id'] = $product_id;
                    $insert[$key]['image_name'] = $image_name;
                    $insert[$key]['created_at'] = Carbon::now();
                    $insert[$key]['updated_at'] = Carbon::now();
                }

                Product_image::insert($insert);
            }
        } else if ($request->image_name) {
            $request->validate([
                'product_name' => 'required|unique:products',
                'category_id' => 'required|numeric',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'stock' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'image_name.*' => 'image|file||max:4096'
            ]);

            if ($request->hasFile('image_name')) {
                foreach ($request->file('image_name') as $key => $file) {
                    $image_name = $file->store('image_name', ['disk' => 'public']);
                    $product_id = $product->id;

                    $insert[$key]['product_id'] = $product_id;
                    $insert[$key]['image_name'] = $image_name;
                    $insert[$key]['created_at'] = Carbon::now();
                    $insert[$key]['updated_at'] = Carbon::now();
                }

                Product_image::insert($insert);
            }
        } else {
            $request->validate([
                'product_name' => 'required|unique:products',
                'category_id' => 'required|numeric',
                'price' => 'required|numeric|min:0',
                'description' => 'required',
                'stock' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0'
            ]);
        }

        // if ($request->image_name) {
        //     $validatedData['image_name'] = $request->file('image_name')->store('image_name', ['disk' => 'public']);
        //     $product_images->image_name = $validatedData['image_name'];
        //     $product_images->save();
        // }

        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $det_categories->category_id = $request->category_id;

        $product->save();
        $det_categories->save();

        return redirect()->route('product-edit', $product->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    }


    // public function product_edit_submit(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     $product_images = Product_image::where('product_id', '=', $product->id)->first();
    //     $det_categories = Product_category_details::where('product_id', '=', $product->id)->first();

    //     if ($request->product_name == $product->product_name) {
    //         $validatedData = $request->validate([
    //             'product_name' => 'required',
    //             'category_id' => 'required|numeric',
    //             'price' => 'required|numeric|min:0',
    //             'description' => 'required',
    //             'stock' => 'required|numeric|min:0',
    //             'weight' => 'required|numeric|min:0',
    //             'image_name' => 'image|file||max:4096'
    //         ]);
    //     } else {
    //         $validatedData = $request->validate([
    //             'product_name' => 'required|unique:products',
    //             'category_id' => 'required|numeric',
    //             'price' => 'required|numeric|min:0',
    //             'description' => 'required',
    //             'stock' => 'required|numeric|min:0',
    //             'weight' => 'required|numeric|min:0',
    //             'image_name' => 'image|file||max:4096'
    //         ]);
    //     }

    //     if ($request->image_name) {
    //         $validatedData['image_name'] = $request->file('image_name')->store('image_name', ['disk' => 'public']);
    //         $product_images->image_name = $validatedData['image_name'];
    //         $product_images->save();
    //     }

    //     $product->product_name = $request->product_name;
    //     $product->price = $request->price;
    //     $product->description = $request->description;
    //     $product->stock = $request->stock;
    //     $product->weight = $request->weight;
    //     $det_categories->category_id = $request->category_id;

    //     $product->save();
    //     $det_categories->save();

    //     return redirect()->route('product-edit', $product->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    // }

    public function product_image_delete(Request $request, $id)
    {
        $product_images = Product_image::find($id);
        $product = Product::where('id', '=', $product_images->product_id)->first();
        $product_images->delete();
        Product_image::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product-edit', $product->id)->with('product_active', 'active')->with(['success' => 'Gambar berhasil dihapus']);
    }

    public function product_delete($id)
    {
        $product = Product::find($id);
        $product_images = Product_image::where('product_id', '=', $product->id);
        $product_category_detail = Product_category_details::where('product_id', '=', $product->id);
        $discount = Discount::where('product_id', '=', $product->id);

        if ($product_images->count() > 0) {
            if ($discount->count() > 0) {
                $discount->delete();
                $product_images->delete();
                $product_category_detail->delete();
                $product->delete();
                return back()->with('product_active', 'active')->with(['success' => 'Data berhasil dihapus']);
            }
            $product_images->delete();
            $product_category_detail->delete();
            $product->delete();
            return back()->with('product_active', 'active')->with(['success' => 'Data berhasil dihapus']);
        } else if ($discount->count() > 0) {
            $discount->delete();
            $product_category_detail->delete();
            $product->delete();
            return back()->with('product_active', 'active')->with(['success' => 'Data berhasil dihapus']);
        } else {
            $product_category_detail->delete();
            $product->delete();
            return back()->with('product_active', 'active')->with(['success' => 'Data berhasil dihapus']);
        }
        return redirect()->route('product')->with('product_active', 'active');
    }

    public function product_trash()
    {
        $page = "Product / Trash";
        $products = Product::onlyTrashed()->get();

        // $product_images = Product_image::onlyTrashed()->where('product_id', '=', $product->id)->get();
        // $product_category_detail = Product_category_details::onlyTrashed()->where('product_id', '=', $product->id)->get();
        // $product_categories_details = Product_category_details::onlyTrashed()->where('id', '=', $product_categories->id)->first();

        return view('admin.product.product-trash', compact('products', 'page'))->with('product_active', 'active');
    }

    public function product_restore($id = null)
    {
        $products = Product::onlyTrashed()->where('id', '=', $id)->first();
        $product_images_cek = Product_image::onlyTrashed()->where('product_id', '=', $products->id)->count();
        $product_discount_cek = Discount::onlyTrashed()->where('product_id', '=', $products->id)->count();
        // $product_images_cek = Product_image::onlyTrashed()->where('product_id', '=', $products->id)->count();

        if ($product_images_cek > 0) {
            if ($product_discount_cek > 0) {
                Discount::onlyTrashed()->where('product_id', '=', $products->id)->restore();
                Product_image::onlyTrashed()->where('product_id', '=', $products->id)->restore();
                Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->restore();
                Product::onlyTrashed()->where('id', $id)->restore();
                return back()->with(['success' => 'Data berhasil dikembalikan']);
            }
            Product_image::onlyTrashed()->where('product_id', '=', $products->id)->restore();
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->restore();
            Product::onlyTrashed()->where('id', $id)->restore();
            return back()->with(['success' => 'Data berhasil dikembalikan']);
        } else if ($product_discount_cek > 0) {
            Discount::onlyTrashed()->where('product_id', '=', $products->id)->restore();
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->restore();
            Product::onlyTrashed()->where('id', $id)->restore();
            return back()->with(['success' => 'Data berhasil dikembalikan']);
        } else {
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->restore();
            Product::onlyTrashed()->where('id', $id)->restore();
            return back()->with(['success' => 'Data berhasil dikembalikan']);
        }
        return redirect()->route('product-categories-trash')->with('product_categories_active', 'active')->with(['success' => 'Data berhasil dikembalikan']);
    }

    public function product_delete_permanently($id = null)
    {
        $products = Product::onlyTrashed()->where('id', '=', $id)->first();
        $product_images_cek = Product_image::onlyTrashed()->where('product_id', '=', $products->id)->count();
        $product_discount_cek = Discount::onlyTrashed()->where('product_id', '=', $products->id)->count();

        if ($product_images_cek > 0) {
            if ($product_discount_cek > 0) {
                Discount::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
                Product_image::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
                Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
                Product::onlyTrashed()->where('id', $id)->forceDelete();
                return back()->with(['success' => 'Data berhasil dihapus permanent']);
            }
            Product_image::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
            Product::onlyTrashed()->where('id', $id)->forceDelete();
            return back()->with(['success' => 'Data berhasil dihapus permanent']);
        } else if ($product_discount_cek > 0) {
            Discount::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
            Product::onlyTrashed()->where('id', $id)->forceDelete();
            return back()->with(['success' => 'Data berhasil dihapus permanent']);
        } else {
            Product_category_details::onlyTrashed()->where('product_id', '=', $products->id)->forceDelete();
            Product::onlyTrashed()->where('id', $id)->forceDelete();
            return back()->with(['success' => 'Data berhasil dihapus permanent']);
        }
        return redirect()->route('product-trash')->with('product_active', 'active')->with(['success' => 'Data berhasil dihapus permanent']);
    }
}
