@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .stat-card {
        background: white;
        padding: 30px;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(255, 105, 180, 0.05);
        display: flex;
        flex-direction: column;
        gap: 10px;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 105, 180, 0.1);
    }

    .stat-label {
        font-size: 0.9rem;
        font-weight: 700;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--accent);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .bg-pink-light { background: #fff0f6; color: #ff69b4; }
    .bg-blue-light { background: #f0f4ff; color: #556ee6; }
    .bg-yellow-light { background: #fffcf0; color: #f1c40f; }
    .bg-green-light { background: #f0fff4; color: #48bb78; }

    .quick-actions {
        margin-top: 40px;
        display: flex;
        gap: 15px;
    }
</style>
@endsection

@section('content')
<div class="card">
    <h2 style="font-size: 1.75rem; font-weight: 800; color: var(--text-main); margin: 0;">Dashboard Overview</h2>
    <p style="color: #888; margin-top: 5px;">Ringkasan data resep mancanegara Anda</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon bg-pink-light">📚</div>
            <div class="stat-label">Total Resep</div>
            <div class="stat-value">{{ $totalResep }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-blue-light">🌍</div>
            <div class="stat-label">Negara Asal</div>
            <div class="stat-value">{{ $totalNegara }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-yellow-light">👨‍🍳</div>
            <div class="stat-label">Pencipta</div>
            <div class="stat-value">{{ $totalPencipta }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-green-light">🏆</div>
            <div class="stat-label">Negara Terbanyak</div>
            <div style="font-size: 1.1rem; font-weight: 700; color: var(--accent); margin-top: 10px;">
                {{ $topNegara->asal_negara ?? '-' }} 
                <span style="display: block; font-size: 0.9rem; color: #888; font-weight: 500;">({{ $topNegara->jumlah ?? 0 }} resep)</span>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
            Kelola Semua Resep
        </a>
    </div>
</div>
@endsection
