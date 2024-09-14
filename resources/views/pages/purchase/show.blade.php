@extends('_partials._main')

@section('pageTitle', 'Detail Transaksi Pembelian')

@section('styles')
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Transaksi Pembelian</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6">
                <strong>Supplier:</strong> {{ $transaction->supplier->name }}<br>
                <strong>Tanggal Transaksi:</strong>
                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y') }}<br>
              </div>
              <div class="col-sm-6 text-right">
                <strong>Total Harga:</strong> Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}
              </div>
            </div>

            <table id="example1" class="table table-bordered table-striped dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga Satuan</th>
                  <th>Kuantitas</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transaction->purchaseTransactionDetails as $detail)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->product->name }}</td>
                    <td class="text-right">Rp. {{ number_format($detail->price, 0, ',', '.') }}</td>
                    <td class="text-right">{{ $detail->quantity }}</td>
                    <td class="text-right">Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">Tidak ada detail transaksi</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

            <div class="row">
              <div class="col-xs-12 text-right">
                <strong>Total Harga: Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</strong>
              </div>
            </div>
          </div>

          <div class="box-footer">
            <a href="{{ route('purchase.index') }}" class="btn btn-default btn-xs btn-flat">
              <i class="fa fa-long-arrow-left"></i> Kembali ke Daftar Transaksi
            </a>
            <button onclick="printPage()" class="btn btn-info btn-xs btn-flat">
              <i class="fa fa-print"></i> Cetak
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

  <script>
    function printPage() {
      window.print();
    }
  </script>
@endsection
