@extends('layouts.public')

@section('title', $resep->nama)

@section('styles')
<style>
    .recipe-detail {
        max-width: 900px;
        margin: 0 auto;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 30px;
        padding: 8px 16px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        font-size: 0.9rem;
    }

    .recipe-header {
        margin-bottom: 40px;
        text-align: center;
    }

    .recipe-title {
        font-family: 'Outfit', sans-serif;
        font-size: 3rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .recipe-hero-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 32px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        margin-bottom: 40px;
    }

    .recipe-info-bar {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 40px;
    }

    .info-item {
        background: white;
        padding: 20px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.03);
    }

    .info-icon {
        font-size: 1.5rem;
        width: 50px;
        height: 50px;
        background: #fff0f6;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
    }

    .info-content label {
        display: block;
        font-size: 0.8rem;
        color: #888;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-content span {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--accent);
    }

    .recipe-section {
        background: white;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title::after {
        content: '';
        flex: 1;
        height: 2px;
        background: #fff0f6;
    }

    .instruction-text {
        white-space: pre-line;
        line-height: 1.8;
        color: #444;
        font-size: 1.1rem;
    }

    .youtube-link {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #ff0000;
        color: white;
        padding: 15px 30px;
        border-radius: 16px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        justify-content: center;
    }

    .youtube-link:hover {
        background: #cc0000;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(204, 0, 0, 0.3);
        color: white;
    }

    @media (max-width: 600px) {
        .recipe-title {
            font-size: 2rem;
        }
        .recipe-info-bar {
            grid-template-columns: 1fr;
        }
        .recipe-section {
            padding: 25px;
        }
    }
</style>
@endsection

@section('content')
<div class="recipe-detail">
    <a href="{{ route('home') }}" class="back-link">
        <span>←</span> Kembali ke Daftar
    </a>

    <div class="recipe-header">
        <h1 class="recipe-title">{{ $resep->nama }}</h1>
    </div>

    @if($resep->gambar)
        <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}" class="recipe-hero-image">
    @endif

    <div class="recipe-info-bar">
        <div class="info-item">
            <div class="info-icon">🌍</div>
            <div class="info-content">
                <label>Asal Negara</label>
                <span>{{ $resep->asal_negara }}</span>
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon">👨‍🍳</div>
            <div class="info-content">
                <label>Pencipta</label>
                <span>{{ $resep->pencipta }}</span>
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon">🏷️</div>
            <div class="info-content">
                <label>Kategori</label>
                <span>{{ ucfirst($resep->kategori) }}</span>
            </div>
        </div>
    </div>

    <div class="recipe-section">
        <h2 class="section-title">📋 Cara Membuat</h2>
        <div class="instruction-text">
            {{ $resep->cara_membuat }}
        </div>
    </div>

    @if($resep->link_youtube)
        <div class="recipe-section">
            <h2 class="section-title">🎥 Video Tutorial</h2>
            <p style="margin-bottom: 20px; color: #666;">Tonton langkah-langkah detailnya di YouTube:</p>
            <a href="{{ $resep->link_youtube }}" target="_blank" rel="noopener noreferrer" class="youtube-link">
                Tonton di YouTube
            </a>
        </div>
    @endif
</div>
@endsection
