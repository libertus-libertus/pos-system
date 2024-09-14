@extends('_partials._main')
@section('pageTitle', 'Tambah Transaksi Pembelian')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="supplier_id">Supplier</label>
                  <select name="supplier_id" class="form-control">
                    <option selected disabled>Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                  </select>
                  <!-- error message untuk title -->
                  @error('supplier_id')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="product_id">Produk</label>
                  <select name="product_id[]" class="form-control">
                    <option selected disabled>Pilih Produk</option>
                    @foreach ($products as $product)
                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                  </select>
                  <!-- error message untuk title -->
                  @error('product_id')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            </div>

            <div class="box-body">
              <label for="quantity">Kuantitas Produk</label>
              <input type="number" name="quantity[]" id="quantity" placeholder="Kuantitas" class="form-control">
            </div>

            <div class="box-body">
              <label for="price">Harga Produk</label>
              <input type="number" name="price[]" id="price" placeholder="Harga" class="form-control">
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Transaksi</button>
              <a href="{{ route('purchase.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
