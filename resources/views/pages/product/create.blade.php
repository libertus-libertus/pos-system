@extends('_partials._main')
@section('pageTitle', 'Tambah Produk')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <form role="form" action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="box-body">
              <label for="name">Nama Produk</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Nama produk" autofocus>
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
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <!-- error message untuk title -->
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
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="box-body">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    placeholder="Harga produk">
                    <!-- error message untuk title -->
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
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
                    placeholder="Stok produk">
                    <!-- error message untuk title -->
                    @error('stock')
                      <p class="text-danger">
                        {{ $message }}
                      </p>
                    @enderror
                  </div>
              </div>
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Produk</button>
              <a href="{{ route('product.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
