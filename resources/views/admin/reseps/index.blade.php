@extends('layouts.app')

@section('title', 'Kelola Resep')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="margin: 0; color: var(--text-main); font-size: 1.75rem; font-weight: 800;">Daftar Resep</h2>
            <p style="margin: 5px 0 0; color: #888; font-weight: 500;">Kelola koleksi resep mancanegara Anda</p>
        </div>
        <a href="{{ route('admin.resep.create') }}" class="btn btn-primary">
            <span style="font-size: 1.2rem;">+</span> Tambah Resep Baru
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px; text-align: center;">No</th>
                    <th style="width: 120px;">Gambar</th>
                    <th>Nama Makanan</th>
                    <th>Asal Negara</th>
                    <th>Pencipta</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reseps as $index => $resep)
                    <tr>
                        <td style="text-align: center; color: #aaa;">{{ $index + 1 }}</td>
                        <td>
                            @if($resep->gambar)
                                <img src="{{ asset('storage/' . $resep->gambar) }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                            @else
                                <div style="width: 80px; height: 60px; background: #fff0f6; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 0.7rem; font-weight: 700;">NO IMG</div>
                            @endif
                        </td>
                        <td>
                            <div style="font-weight: 700; color: var(--text-main);">{{ $resep->nama }}</div>
                        </td>
                        <td>
                            <span style="background: #f0f4ff; color: #556ee6; padding: 4px 12px; border-radius: 8px; font-size: 0.85rem; font-weight: 600;">{{ $resep->asal_negara }}</span>
                        </td>
                        <td>{{ $resep->pencipta }}</td>
                        <td>
                            <div class="action-btns" style="justify-content: center;">
                                <a href="{{ route('admin.resep.edit', $resep->id) }}" class="btn" style="background: #fff0f6; color: var(--primary); padding: 8px 15px;">
                                    Edit
                                </a>
                                <form action="{{ route('admin.resep.destroy', $resep->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #fff5f5; color: #ff4d4f; padding: 8px 15px;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #aaa;">
                            <div style="font-size: 3rem; margin-bottom: 10px;">🍳</div>
                            Belum ada resep ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
