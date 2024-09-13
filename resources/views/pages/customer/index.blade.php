@extends('_partials._main')
@section('pageTitle', 'Data Pelanggan')
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
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-6">
                  <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                        aria-controls="example1" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select> entries</label></div>
                </div>
                <div class="col-sm-6">
                  <div id="example1_filter" class="dataTables_filter">
                    <a href="{{ route('customer.create') }}" class="btn btn-primary btn-xs btn-flat">
                      <i class="fa fa-plus-circle"> Tambah Pelanggan</i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th style="width: 10%">No</th>
                        <th>Pelanggan</th>
                        <th>Nomor Telp</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($customers as $item)
                        <tr class="even">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->phone }}</td>
                          <td>{{ $item->address }}</td>
                          <td class="text-center">
                            <form class="btn-group" onsubmit="return confirm('Apakah Anda Yakin ?');"
                              action="{{ route('customer.destroy', $item->id) }}" method="post">
                              <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                                Ubah
                              </a>
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                                Hapus
                              </button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr class="even">
                          <td colspan="5" class="text-center">
                            Belum ada data
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>
@endsection
