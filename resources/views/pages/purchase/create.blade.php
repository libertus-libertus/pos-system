@extends('_partials._main')
@section('pageTitle', 'Tambah Transaksi Pembelian')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12 col-lg-12">
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
            </div>

            <!-- Products Section -->
            <div id="products">
              <div class="row product-group">
                <div class="col-md-4 col-lg-4">
                  <div class="box-body">
                    <label for="product_id">Produk</label>
                    <select name="product_id[]" class="form-control">
                      <option selected disabled>Pilih Produk</option>
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4 col-lg-4">
                  <div class="box-body">
                    <label for="quantity">Kuantitas Produk</label>
                    <input type="number" name="quantity[]" id="quantity" placeholder="Kuantitas" class="form-control"
                      required>
                  </div>
                </div>

                <div class="col-md-4 col-lg-4">
                  <div class="box-body">
                    <label for="price">Harga Produk</label>
                    <input type="number" name="price[]" id="price" placeholder="Harga" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="box-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-xs btn-flat">
                        <i class="fa fa-save"></i>
                        Simpan Transaksi
                    </button>
                    <!-- Button to Add More Products -->
                    <button type="button" id="addProduct" class="btn btn-success btn-xs btn-flat">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Produk Baru
                      </button>
                    <a href="{{ route('purchase.index') }}" class="btn btn-warning btn-xs btn-flat">
                        <i class="fa fa-refresh"></i>
                        Kembali
                    </a>
                </div>
                <div class="box-footer"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script type="text/javascript">
    document.getElementById('addProduct').addEventListener('click', function() {
      var productHTML = `
        <!-- Products Section -->
        <div id="products">
            <div class="row product-group">
            <div class="col-md-3 col-lg-3">
                <div class="box-body">
                <label for="product_id">Produk</label>
                <select name="product_id[]" class="form-control">
                    <option selected disabled>Pilih Produk</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="box-body">
                <label for="quantity">Kuantitas Produk</label>
                <input type="number" name="quantity[]" id="quantity" placeholder="Kuantitas" class="form-control"
                    required>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="box-body">
                <label for="price">Harga Produk</label>
                <input type="number" name="price[]" id="price" placeholder="Harga" class="form-control" required>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="box-body">
                <label for="price">Harga Produk</label>
                <input type="number" name="price[]" id="price" placeholder="Harga" class="form-control" required>
                </div>
            </div>
            </div>

            <div class="box-body">
            <button type="button" class="btn btn-danger btn-xs btn-flat removeProduct">
                <i class="fa fa-trash"></i>
                Hapus Produk
            </button>
            </div>
        </div>`;
      document.getElementById('products').insertAdjacentHTML('beforeend', productHTML);
    });

    document.getElementById('products').addEventListener('click', function(e) {
      if (e.target.classList.contains('removeProduct')) {
        e.target.parentElement.parentElement.remove();
      }
    });
  </script>
@endsection
