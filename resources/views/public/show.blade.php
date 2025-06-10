@extends('layouts.public')

@section('title', $resep->nama)

@section('content')
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">

        <a href="{{ route('home') }}" style="display: inline-block; margin-bottom: 25px; text-decoration: none; color: #2563eb; font-weight: bold;">
            ← Kembali ke Daftar Resep
        </a>

        <h1 style="font-size: 2.5rem; margin-bottom: 20px; color: #111827;">{{ $resep->nama }}</h1>

        @if($resep->gambar)
            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}"
                 style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 12px; margin-bottom: 25px;">
        @endif

        <div style="margin-bottom: 20px; font-size: 1.1rem;">
            <p><strong>🌍 Asal Negara:</strong> {{ $resep->asal_negara }}</p>
            <p><strong>👨‍🍳 Pencipta:</strong> {{ $resep->pencipta }}</p>
        </div>

        <div style="margin-top: 30px;">
            <h2 style="font-size: 1.5rem; color: #111827; margin-bottom: 10px;">📋 Cara Membuat</h2>
            <p style="white-space: pre-line; line-height: 1.8; background: #f9fafb; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb;">
                {{ $resep->cara_membuat }}
            </p>
        </div>

        @if($resep->link_youtube)
            <div style="margin-top: 35px;">
                <h2 style="font-size: 1.5rem; color: #111827; margin-bottom: 10px;">🎥 Video YouTube</h2>
                <a href="{{ $resep->link_youtube }}" target="_blank" rel="noopener noreferrer"
                   style="color: #2563eb; text-decoration: underline; font-weight: 500;">
                    Tonton di YouTube
                </a>
            </div>
        @endif

    </div>
@endsection
