@extends('_partials._main')
@section('pageTitle', 'Ubah Kategori')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('supplier.update', $supplier->id) }}" method="post">
            @csrf
            @method('put')
            <div class="box-body">
              <label for="name">Perusahaan (Penyuply)</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $supplier->name }}"
                placeholder="Perusahaan" autofocus>
              <!-- error message untuk title -->
              @error('name')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
            <div class="box-body">
              <label for="phone">Nomor Wa/Telp</label>
              <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" value="{{ $supplier->phone }}" placeholder="Contoh: 081201010100">
              <!-- error message untuk title -->
              @error('phone')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
            <div class="box-body">
              <label for="address">Alamat</label>
              <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" cols="10"
                rows="5" placeholder="Masukkan alamat penyuply disini">{{ $supplier->address }}</textarea>
              <!-- error message untuk title -->
              @error('address')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Perubahan</button>
              <a href="{{ route('supplier.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
