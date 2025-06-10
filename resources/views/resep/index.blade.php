@extends('layouts.app')

@section('content')
<a href="{{ route('admin.resep.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Resep</a>

<table class="table table-bordered table-hover bg-white">
    <thead class="table-light">
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>Pencipta</th>
            <th>Youtube</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reseps as $resep)
        <tr>
            <td>
                @if($resep->gambar)
                    <img src="{{ asset('gambar/' . $resep->gambar) }}" width="80">
                @endif
            </td>
            <td>{{ $resep->nama_makanan }}</td>
            <td>{{ $resep->asal_negara }}</td>
            <td>{{ $resep->pencipta }}</td>
            <td>
                @if($resep->youtube_link)
                    <a href="{{ $resep->youtube_link }}" target="_blank" class="btn btn-sm btn-outline-info">Lihat</a>
                @endif
            </td>
            <td>
                <a href="{{ route('resep.edit', $resep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
