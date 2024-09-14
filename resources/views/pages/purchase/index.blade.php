@extends('_partials._main')
@section('pageTitle', 'Data Transaksi Pembelian')
@section('styles')
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <a href="{{ route('purchase.create') }}" class="btn btn-primary btn-xs btn-flat">
                  <i class="fa fa-plus-circle"> Tambah Transaksi Pembelian</i>
                </a>
              </div>
            </div>
            <table id="example1" class="table table-bordered table-striped dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Supplier</th>
                  <th>Total Harga</th>
                  <th>Tanggal Transaksi</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $transaction)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->supplier->name }}</td>
                    <td class="text-right">Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y') }}</td>
                    <td class="text-center">
                      <form class="btn-group" action="{{ route('purchase.destroy', $transaction->id) }}" method="post">
                        <a href="{{ route('purchase.edit', $transaction->id) }}" class="btn btn-primary btn-xs">
                          <i class="fa fa-edit"></i> Ubah
                        </a>
                        <a href="{{ route('purchase.show', $transaction->id) }}" class="btn btn-warning btn-xs">
                          <i class="fa fa-eye"></i> Details
                        </a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus?')">
                          <i class="fa fa-trash"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">Belum ada transaksi</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection
