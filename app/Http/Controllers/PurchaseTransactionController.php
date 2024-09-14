<?php

namespace App\Http\Controllers;

use App\Models\PurchaseTransaction;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\PurchaseTransactionDetail;
use Illuminate\Http\Request;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $transactions = PurchaseTransaction::with('supplier')->get();
        return view('pages.purchase.index', compact('transactions'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('pages.purchase.create', compact('suppliers', 'products'));
    }

    // show details product
    public function show($id)
    {
        // Mengambil data transaksi beserta detailnya
        $transaction = PurchaseTransaction::with('purchaseTransactionDetails.product')->findOrFail($id);

        // Tampilkan halaman detail transaksi
        return view('pages.purchase.show', compact('transaction'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'product_id' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
        ]);

        // Buat transaksi pembelian
        $transaction = PurchaseTransaction::create([
            // 'user_id' => auth()->user()->id,
            'supplier_id' => $request->supplier_id,
            'total_price' => 0,
            'transaction_date' => now(),
        ]);

        // Simpan detail transaksi pembelian
        $total_price = 0;
        foreach ($request->product_id as $index => $productId) {
            $quantity = $request->quantity[$index];
            $price = $request->price[$index];
            $subtotal = $quantity * $price;

            PurchaseTransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            // Update stok produk
            $product = Product::find($productId);
            $product->stock += $quantity;
            $product->save();

            $total_price += $subtotal;
        }

        // Update total harga transaksi
        $transaction->update(['total_price' => $total_price]);

        return redirect()->route('purchase.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaction = PurchaseTransaction::with('purchaseTransactionDetails')->findOrFail($id);
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('purchase.edit', compact('transaction', 'suppliers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required',
            'product_id' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
        ]);

        // Update transaksi
        $transaction = PurchaseTransaction::findOrFail($id);
        $transaction->update([
            'supplier_id' => $request->supplier_id,
            'transaction_date' => now(),
        ]);

        // Hapus detail lama
        foreach ($transaction->purchaseTransactionDetails as $detail) {
            $product = Product::find($detail->product_id);
            $product->stock -= $detail->quantity; // Kembalikan stok
            $product->save();
            $detail->delete();
        }

        // Simpan detail baru
        $total_price = 0;
        foreach ($request->product_id as $index => $productId) {
            $quantity = $request->quantity[$index];
            $price = $request->price[$index];
            $subtotal = $quantity * $price;

            PurchaseTransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            // Update stok produk
            $product = Product::find($productId);
            $product->stock += $quantity;
            $product->save();

            $total_price += $subtotal;
        }

        // Update total harga transaksi
        $transaction->update(['total_price' => $total_price]);

        return redirect()->route('pages.purchase.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaction = PurchaseTransaction::findOrFail($id);
        foreach ($transaction->purchaseTransactionDetails as $detail) {
            $product = Product::find($detail->product_id);
            $product->stock -= $detail->quantity; // Kembalikan stok
            $product->save();
            $detail->delete();
        }
        $transaction->delete();

        return redirect()->route('pages.purchase.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
