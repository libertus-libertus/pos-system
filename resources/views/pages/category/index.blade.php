@extends('_partials._main')
@section('pageTitle', 'Data Kategori')
@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-xs btn-flat">
                  <i class="fa fa-plus-circle"> Tambah Kategori</i>
                </a>
              </div>
            </div>
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
              aria-describedby="example1_info">
              <thead>
                <tr>
                  <th style="width: 10%">No</th>
                  <th>Kategori</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($categories as $item)
                  <tr class="even">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                      <form class="btn-group" onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('category.destroy', $item->id) }}" method="post">
                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-primary btn-xs btn-flat">
                          <i class="fa fa-edit"></i>
                          Ubah
                        </a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger btn-xs btn-flat">
                          <i class="fa fa-trash"></i>
                          Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr class="even">
                    <td colspan="3" class="text-center">
                        <i class="fa fa-print"></i>
                      Belum ada data
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
  </section>
@endsection

@section('scripts')
  <!-- DataTables -->
  <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
  </script>
@endsection
