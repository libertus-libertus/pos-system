@extends('_partials._main')
@section('pageTitle', 'Ubah Kategori')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="box-body">
              <label for="name">Nama Kategori</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Kategori" value="{{ $category->name }}" autofocus>
              @error('name')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">Simpan Perubahan</button>
              <a href="{{ route('category.index') }}" class="btn btn-warning btn-xs btn-flat">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
