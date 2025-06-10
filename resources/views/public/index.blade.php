@extends('layouts.public')

@section('title', 'Daftar Resep Mancanegara')

@section('content')
    <div class="grid" style="display:flex; flex-wrap: wrap; gap: 20px;">
        @foreach($reseps as $resep)
            <div style="width: 200px; border: 1px solid #ccc; padding: 10px; background: white; text-align: center; border-radius: 6px;">
                <a href="{{ route('public.show', $resep->id) }}">
                    @if($resep->gambar)
                        <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}" style="width:100%; height:150px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width:100%; height:150px; background:#eee; line-height:150px; color:#aaa;">No Image</div>
                    @endif
                </a>
                <p style="margin-top: 10pxZ; font-weight: bold;">{{ $resep->nama }}</p>
            </div>
        @endforeach
    </div>
@endsection