<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function courier_add()
    {
        $page = "Courier / Add";
        return view('admin.courier.courier-add', compact('page'))->with('courier_active', 'active');
    }

    public function courier_add_submit(Request $request)
    {
        $request->validate([
            'courier' => 'required'
        ]);

        $add_courier = array(
            'courier' => $request->courier
        );

        Courier::create($add_courier);
        return redirect()->route('courier-add')->with(['success' => 'Input data berhasil dilakukan']);
    }

    public function courier_edit($id)
    {
        $page = "Courier / Edit";
        $courier = Courier::find($id);
        return view('admin.courier.courier-edit', compact('courier', 'page'))->with('courier_active', 'active');
    }

    public function courier_edit_submit(Request $request, $id)
    {
        $courier = Courier::find($id);

        if ($request->courier == $courier->courier) {
            $request->validate([
                'courier' => 'required'
            ]);
        } else {
            $request->validate([
                'courier' => 'required|unique:couriers'
            ]);
        }

        $courier->courier = $request->courier;
        $courier->save();

        return redirect()->route('courier-edit', $courier->id)->with(['success' => 'Perubahan data berhasil dilakukan']);
    }

    public function courier_delete($id)
    {
        $courier = Courier::find($id);
        $courier->delete();
        return redirect()->route('courier')->with(['success' => 'Data berhasil dihapus']);
    }

    public function courier_trash()
    {
        $page = "Courier / Trash";
        $couriers = Courier::onlyTrashed()->get();

        return view('admin.courier.courier-trash', compact('couriers', 'page'))->with('courier_active', 'active');
    }

    public function courier_restore($id = null)
    {
        Courier::onlyTrashed()->where('id', $id)->restore();

        return redirect()->route('courier-trash')->with('courier_active', 'active')->with(['success' => 'Data berhasil dikembalikan']);
    }

    public function courier_delete_permanently($id = null)
    {
        Courier::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('courier-trash')->with('courier_active', 'active')->with(['success' => 'Data berhasil dihapus permanent']);
    }
}
