@extends('layouts.app')

@section('content')
    <h4>Dashboard Admin</h4>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-book"></i> Total Resep</h5>
                    <p class="fs-4">{{ $totalResep }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-globe"></i> Negara Asal</h5>
                    <p class="fs-4">{{ $totalNegara }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-person"></i> Pencipta</h5>
                    <p class="fs-4">{{ $totalPencipta }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-flag"></i> Negara Terbanyak</h5>
                    <p class="fs-5">
                        {{ $topNegara->asal_negara ?? '-' }} ({{ $topNegara->jumlah ?? 0 }} resep)
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('resep.index') }}" class="btn btn-dark mt-4"><i class="bi bi-list"></i> Kelola Resep</a>
@endsection
