@extends('_partials._main')
@section('pageTitle', 'Tambah Kategori')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <form role="form" action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="box-body">
              <label for="name">Nama Kategori</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Kategori" autofocus>
              <!-- error message untuk title -->
              @error('name')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <div class="box-body">
              <button type="submit" class="btn btn-primary btn-xs btn-flat">
                <i class="fa fa-save"></i>
                Simpan Kategori
              </button>
              <a href="{{ route('category.index') }}" class="btn btn-warning btn-xs btn-flat">
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
