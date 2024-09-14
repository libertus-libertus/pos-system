@extends('_partials._main')
@section('pageTitle', 'Ubah Transaksi Pembelian')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <form action="{{ route('purchase.update', $transaction->id) }}" method="post">
            @csrf
            @method('put')

            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="box-body">
                  <label for="supplier_id">Supplier</label>
                  <select name="supplier_id" class="form-control">
                    <option selected disabled>Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                      <option value="{{ $supplier->id }}"
                        {{ $supplier->id == $transaction->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('supplier_id')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Products Section -->
            <div id="products">
              @foreach ($transaction->purchaseTransactionDetails as $detail)
                <div class="row product-group">
                  <div class="col-md-6 col-lg-6">
                    <div class="box-body">
                      <label for="product_id">Produk</label>
                      <select name="product_id[]" class="form-control">
                        <option selected disabled>Pilih Produk</option>
                        @foreach ($products as $product)
                          <option value="{{ $product->id }}" {{ $product->id == $detail->product_id ? 'selected' : '' }}>
                            {{ $product->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3">
                    <div class="box-body">
                      <label for="quantity">Kuantitas Produk</label>
                      <input type="number" name="quantity[]" value="{{ $detail->quantity }}" class="form-control"
                        required>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3">
                    <div class="box-body">
                      <label for="price">Harga Produk</label>
                      <input type="number" name="price[]" value="{{ $detail->price }}" class="form-control" required>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">
                <i class="fa fa-save"></i>
                Simpan Perubahan
              </button>
              <a href="{{ route('purchase.index') }}" class="btn btn-warning btn-xs btn-flat">
                <i class="fa fa-refresh"></i>
                Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
