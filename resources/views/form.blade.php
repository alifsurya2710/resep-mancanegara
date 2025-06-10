<div class="mb-2">
    <label>Nama Makanan</label>
    <input type="text" name="nama_makanan" class="form-control" value="{{ old('nama_makanan', $resep->nama_makanan ?? '') }}">
</div>
<div class="mb-2">
    <label>Asal Negara</label>
    <input type="text" name="asal_negara" class="form-control" value="{{ old('asal_negara', $resep->asal_negara ?? '') }}">
</div>
<div class="mb-2">
    <label>Pencipta</label>
    <input type="text" name="pencipta" class="form-control" value="{{ old('pencipta', $resep->pencipta ?? '') }}">
</div>
<div class="mb-2">
    <label>Bahan</label>
    <textarea name="bahan" class="form-control">{{ old('bahan', $resep->bahan ?? '') }}</textarea>
</div>
<div class="mb-2">
    <label>Cara Membuat</label>
    <textarea name="cara_membuat" class="form-control">{{ old('cara_membuat', $resep->cara_membuat ?? '') }}</textarea>
</div>
<div class="mb-2">
    <label>Gambar</label><br>
    @if(isset($resep) && $resep->gambar)
        <img src="{{ asset('gambar/' . $resep->gambar) }}" width="120"><br>
    @endif
    <input type="file" name="gambar" class="form-control">
</div>
<div class="mb-2">
    <label>Link YouTube</label>
    <input type="url" name="youtube_link" class="form-control" value="{{ old('youtube_link', $resep->youtube_link ?? '') }}">
</div>
