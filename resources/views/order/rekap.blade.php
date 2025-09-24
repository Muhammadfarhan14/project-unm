@extends('layouts.app')

@section('title', 'Rekap Pesanan')

@section('content')
<div class="container-fluid px-4 py-4">

    <!-- Form Rekap -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('order.rekap') }}">
                <div class="mb-3">
                    <label class="form-label">Jenis Rekapan</label>
                    <select class="form-select" name="jenis">
                        <option value="harian">Rekap Harian</option>
                        <option value="bulanan">Rekap Bulanan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal', date('Y-m-d')) }}">
                </div>
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </form>
        </div>
    </div>

    <!-- Tabel Rekap -->
    <div class="card">
        <div class="card-body">
            <table id="rekapTable" class="display nowrap table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Meja</th>
                        <th>Total Belanja</th>
                        <th>Jenis Pembayaran</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $i => $order)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>Meja Nomor {{ $order->meja->nomorMeja ?? '-' }}</td>
                        <td>Rp. {{ number_format($order->total,0,',','.') }}</td>
                        <td>{{ ucfirst($order->payment_method) }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)
                                <li>{{ $item->nama }} (x{{ $item->pivot->qty }})</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#rekapTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel', 'pdf', 'print']
        });
    });
</script>
@endpush