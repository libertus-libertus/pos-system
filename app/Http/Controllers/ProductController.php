<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'supplier')->get();
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('pages.product.create', compact('category', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ],
            [
                'name.required' => 'Nama produk wajib diisi',
                'category_id.required' => 'Kategori produk wajib diisi',
                'supplier_id.required' => 'Supplier produk wajib diisi',
                'price.required' => 'Harga produk wajib diisi',
                'stock.required' => 'Stok produk wajib diisi',
            ]
        );

        Product::create($request->all());

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        $supplier = Supplier::all();

        return view('pages.product.edit', compact('product', 'category', 'supplier'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ],
            [
                'name.required' => 'Nama produk wajib diisi',
                'category_id.required' => 'Kategori produk wajib diisi',
                'supplier_id.required' => 'Supplier produk wajib diisi',
                'price.required' => 'Harga produk wajib diisi',
                'stock.required' => 'Stok produk wajib diisi',
            ]
        );

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Produk berhasil diubah');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
