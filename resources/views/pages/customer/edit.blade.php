@extends('_partials._main')
@section('pageTitle', 'Ubah Pelanaggan')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('customer.update', $customer->id) }}" method="post">
            @csrf
            @method('put')
            <div class="box-body">
              <label for="name">Pelanggan</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $customer->name }}"
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
              <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" value="{{ $customer->phone }}" placeholder="Contoh: 081201010100">
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
                rows="5" placeholder="Masukkan alamat pelanggan disini">{{ $customer->address }}</textarea>
              <!-- error message untuk title -->
              @error('address')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Perubahan</button>
              <a href="{{ route('customer.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
