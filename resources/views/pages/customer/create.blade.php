@extends('_partials._main')
@section('pageTitle', 'Tambah Pelanggan')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('customer.store') }}" method="post">
            @csrf
            <div class="box-body">
              <label for="name">Pelanggan</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Nama pelanggan" autofocus>
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
              <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" cols="10" rows="5" placeholder="Masukkan alamat pelanggan disini"></textarea>
              <!-- error message untuk title -->
              @error('address')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Pelanggan</button>
              <a href="{{ route('customer.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
