<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('pages.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('pages.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ],
            [
                'name.required' => 'Nama pelanggan wajib diisi',
                'phone.required' => 'Nomor wa/telp pelanggan wajib diisi',
                'address.required' => 'Alamat pelanggan wajib diisi'
            ]
        );

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit(Customer $customer)
    {
        return view('pages.customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ],
            [
                'name.required' => 'Nama pelanggan wajib diisi',
                'phone.required' => 'Nomor wa/telp pelanggan wajib diisi',
                'address.required' => 'Alamat pelanggan wajib diisi'
            ]
        );

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil diubah');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil diubah');
    }
}
