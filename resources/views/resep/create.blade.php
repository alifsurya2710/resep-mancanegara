@extends('layouts.app')

@section('content')
<h4>Tambah Resep</h4>
<form method="POST" action="{{ route('resep.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Input lainnya -->
    
    <label>Gambar:</label>
    <input type="file" name="gambar" required>

    <button type="submit">Simpan</button>
</form>

@endsection
