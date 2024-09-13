<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('pages.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Perusahaan wajib diisi',
                'phone.required' => 'Nomor handphone wajib diisi',
                'address.required' => 'Alamat wajib diisi',
            ]
        );

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Perusahaan wajib diisi',
                'phone.required' => 'Nomor handphone wajib diisi',
                'address.required' => 'Alamat wajib diisi',
            ]
        );

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diubah');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus');
    }

}
