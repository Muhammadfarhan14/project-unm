@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary h-100">
            <div class="card-body">
                <h5 class="card-title">Pesanan Selesai</h5>
                <h2>{{ $totalOrders ?? 0 }}</h2>
                <p>pesanan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger h-100">
            <div class="card-body">
                <h5 class="card-title">Total Pendapatan</h5>
                <h2>{{ number_format($revenue, 0, ',', '.') }}</h2>
                <p>rupiah / bulanan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success h-100">
            <div class="card-body">
                <h5 class="card-title">Bounce Rate</h5>
                <h2>34.6%</h2>
                <p>-4.5% from last week</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning h-100">
            <div class="card-body">
                <h5 class="card-title">Total Customers</h5>
                <h2>{{ $totalUsers ?? 0 }}</h2>
                <p>+8.4% from last week</p>
            </div>
        </div>
    </div>
</div>
@endsection