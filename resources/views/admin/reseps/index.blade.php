@extends('layouts.app')

@section('content')
    <h2>Daftar Resep Mancanegara</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.resep.create') }}">+ Tambah Resep Baru</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Makanan</th>
                <th>Asal Negara</th>
                <th>Pencipta</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reseps as $index => $resep)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($resep->gambar)
                            <img src="{{ asset('storage/' . $resep->gambar) }}" width="100">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ $resep->nama }}</td>
                    <td>{{ $resep->asal_negara }}</td>
                    <td>{{ $resep->pencipta }}</td>
                    <td>
                        <a href="{{ route('admin.resep.edit', $resep->id) }}">Edit</a> |
                        <form action="{{ route('admin.resep.destroy', $resep->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada resep ditambahkan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
