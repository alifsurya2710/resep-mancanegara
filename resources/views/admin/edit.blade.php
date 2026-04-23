@extends('layouts.app')

@section('title', 'Edit Resep: ' . $resep->nama)

@section('styles')
<style>
    .form-card {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 32px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(255, 105, 180, 0.1);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        width: 100%;
        padding: 15px 20px;
        border-radius: 16px;
        border: 2px solid #fff0f6;
        background: #fafafa;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 500;
        color: var(--text-main);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        background: white;
        box-shadow: 0 0 0 4px rgba(255, 105, 180, 0.1);
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .current-image-preview {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 20px;
        margin-bottom: 15px;
        border: 4px solid #fff0f6;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    .custom-file-btn {
        background: #fff0f6;
        color: var(--primary);
        padding: 15px 20px;
        border-radius: 16px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 2px dashed var(--primary);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .custom-file-btn:hover {
        background: #ffe0eb;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 40px;
    }

    .btn-submit {
        flex: 2;
        justify-content: center;
    }

    .btn-cancel {
        flex: 1;
        justify-content: center;
        background: #f5f5f5;
        color: #888;
    }

    .btn-cancel:hover {
        background: #eeeeee;
        color: #444;
    }
</style>
@endsection

@section('content')
<div class="form-card">
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="font-size: 2rem; font-weight: 800; color: var(--text-main); margin: 0;">Edit Resep</h2>
        <p style="color: #888; margin-top: 5px;">Perbarui informasi kuliner untuk <strong>{{ $resep->nama }}</strong></p>
    </div>

    <form method="POST" action="{{ route('admin.resep.update', $resep->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Makanan</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $resep->nama) }}" required autofocus>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="asal_negara">Asal Negara</label>
                <input type="text" id="asal_negara" name="asal_negara" class="form-control" value="{{ old('asal_negara', $resep->asal_negara) }}" required>
            </div>

            <div class="form-group">
                <label for="pencipta">Pencipta</label>
                <input type="text" id="pencipta" name="pencipta" class="form-control" value="{{ old('pencipta', $resep->pencipta) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="cara_membuat">Cara Membuat</label>
            <textarea id="cara_membuat" name="cara_membuat" class="form-control" required>{{ old('cara_membuat', $resep->cara_membuat) }}</textarea>
        </div>

        <div class="form-group">
            <label for="link_youtube">Link Tutorial YouTube (Opsional)</label>
            <input type="url" id="link_youtube" name="link_youtube" class="form-control" value="{{ old('link_youtube', $resep->link_youtube) }}">
        </div>

        <div class="form-group">
            <label>Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->nama }}" class="current-image-preview">
            
            <label for="gambar" style="margin-top: 15px;">Ganti Gambar (Opsional)</label>
            <div class="file-input-wrapper">
                <div class="custom-file-btn" id="file-label">
                    <span>📁 Pilih Foto Baru</span>
                </div>
                <input type="file" id="gambar" name="gambar" accept="image/*" onchange="updateFileName(this)">
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-cancel">Batal</a>
            <button type="submit" class="btn btn-primary btn-submit">Perbarui Resep</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function updateFileName(input) {
        const label = document.getElementById('file-label');
        if (input.files && input.files.length > 0) {
            label.innerHTML = `<span>✅ ${input.files[0].name}</span>`;
            label.style.borderColor = '#48bb78';
            label.style.background = '#f0fff4';
            label.style.color = '#2f855a';
        }
    }
</script>
@endsection
