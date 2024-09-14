@extends('_partials._main')
@section('pageTitle', 'Ubah Produk')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <form role="form" action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('put') <!-- Untuk method PUT saat mengupdate data -->

            <div class="box-body">
              <label for="name">Nama Produk</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $product->name) }}" placeholder="Nama produk" autofocus>
              <!-- error message untuk title -->
              @error('name')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="category_id">Kategori</label>
                  <select class="form-control" id="category_id" name="category_id">
                    <option selected disabled>Pilih kategori</option>
                    @foreach ($category as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                        {{ $item->name }}
                      </option>
                    @endforeach
                  </select>
                  <!-- error message untuk category -->
                  @error('category_id')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="supplier_id">Supplier</label>
                  <select class="form-control" id="supplier_id" name="supplier_id">
                    <option selected disabled>Pilih supplier</option>
                    @foreach ($supplier as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $product->supplier_id ? 'selected' : '' }}>
                        {{ $item->name }}
                      </option>
                    @endforeach
                  </select>
                  <!-- error message untuk supplier -->
                  @error('supplier_id')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="price">Harga</label>
                  <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}" placeholder="Harga produk">
                  <!-- error message untuk price -->
                  @error('price')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                  <label for="stock">Stok (Persediaan)</label>
                  <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stok produk">
                  <!-- error message untuk stock -->
                  @error('stock')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">
                <i class="fa fa-save"></i>
                Simpan Perubahan
              </button>
              <a href="{{ route('product.index') }}" class="btn btn-warning btn-xs btn-flat">
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
