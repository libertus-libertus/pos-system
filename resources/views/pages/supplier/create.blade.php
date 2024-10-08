@extends('_partials._main')
@section('pageTitle', 'Tambah Supplier')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('supplier.store') }}" method="post">
            @csrf
            <div class="box-body">
              <label for="name">Perusahaan (Penyuply)</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
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
              <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                placeholder="Contoh: 081201010100">
              <!-- error message untuk title -->
              @error('phone')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
            <div class="box-body">
              <label for="address">Alamat</label>
              <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" cols="10" rows="5" placeholder="Masukkan alamat penyuply disini"></textarea>
              <!-- error message untuk title -->
              @error('address')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">
                <i class="fa fa-save"></i>
                Simpan Supplier
              </button>
              <a href="{{ route('supplier.index') }}" class="btn btn-warning btn-xs btn-flat">
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
