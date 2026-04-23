@extends('layouts.public')

@section('title', 'Daftar Resep Mancanegara')

@section('styles')
<style>
    .recipe-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(255, 105, 180, 0.1);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .recipe-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255, 105, 180, 0.2);
        border-color: var(--primary-light);
    }

    .recipe-image-wrapper {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .recipe-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .recipe-card:hover .recipe-image {
        transform: scale(1.1);
    }

    .recipe-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--primary-dark);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .recipe-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .recipe-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .recipe-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
        color: #888;
        margin-bottom: 15px;
    }

    .view-btn {
        width: 100%;
        padding: 10px;
        border-radius: 12px;
        background: #fff0f6;
        color: var(--primary-dark);
        text-align: center;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .recipe-card:hover .view-btn {
        background: var(--primary);
        color: white;
    }
</style>
@endsection

@section('content')
    <div class="recipe-grid">
        @foreach($reseps as $resep)
            <div class="recipe-card">
                <a href="{{ route('public.show', $resep->id) }}" class="recipe-image-wrapper">
                    @if($resep->gambar)
                        <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}" class="recipe-image">
                    @else
                        <div style="width:100%; height:100%; background:#fce4ec; display:flex; align-items:center; justify-content:center; color:#f06292; font-weight:bold;">
                            No Image
                        </div>
                    @endif
                    <div class="recipe-badge">Resep</div>
                </a>
                <div class="recipe-info">
                    <h3 class="recipe-name">{{ $resep->nama }}</h3>
                    <div class="recipe-meta">
                        <span>🌍 Mancanegara</span>
                        <span>•</span>
                        <span>Lezat & Mudah</span>
                    </div>
                    <a href="{{ route('public.show', $resep->id) }}" class="view-btn">Lihat Resep</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection