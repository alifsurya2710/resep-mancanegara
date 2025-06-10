<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResepController extends Controller
{
    // Menampilkan daftar resep
    public function index()
    {
        $reseps = Resep::all();
        return view('resep.index', compact('reseps'));
    }

    // Menampilkan form tambah resep
    public function create()
    {
        return view('resep.create');
    }

    // Menyimpan resep baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_makanan' => 'required',
            'asal_negara' => 'required',
            'pencipta' => 'required',
            'bahan' => 'required',
            'cara_membuat' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'youtube_link' => 'nullable|url',
        ]);

        // Buat instance Resep baru, isi dari form kecuali 'gambar'
        $resep = new Resep($request->except('gambar'));

        // Proses upload gambar jika ada file gambar yang dikirim
        if ($request->hasFile('gambar')) {
            // Buat nama file unik berdasarkan waktu + nama makanan yg di-slug
            $filename = time() . '_' . Str::slug($request->nama_makanan) . '.' . $request->gambar->extension();

            // Pindahkan file gambar ke folder 'public/gambar'
            $request->gambar->move(public_path('gambar'), $filename);

            // Simpan nama file ke atribut gambar di model
            $resep->gambar = $filename;
        }

        // Simpan data resep ke database
        $resep->save();

        // Redirect ke halaman list resep dengan pesan sukses
        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    // Menampilkan form edit resep
    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        return view('resep.edit', compact('resep'));
    }

    // Memperbarui data resep di database
    public function update(Request $request, $id)
    {
        // Validasi input form update
        $request->validate([
            'nama_makanan' => 'required',
            'asal_negara' => 'required',
            'pencipta' => 'required',
            'bahan' => 'required',
            'cara_membuat' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'youtube_link' => 'nullable|url',
        ]);

        // Ambil data resep berdasarkan id
        $resep = Resep::findOrFail($id);

        // Update data dari form kecuali gambar
        $resep->fill($request->except('gambar'));

        // Jika ada file gambar baru, proses upload dan ganti file lama
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($resep->gambar && file_exists(public_path('gambar/' . $resep->gambar))) {
                unlink(public_path('gambar/' . $resep->gambar));
            }

            // Buat nama file baru yang unik
            $filename = time() . '_' . Str::slug($request->nama_makanan) . '.' . $request->gambar->extension();

            // Pindahkan file gambar baru ke folder 'public/gambar'
            $request->gambar->move(public_path('gambar'), $filename);

            // Update nama file gambar di model
            $resep->gambar = $filename;
        }

        // Simpan perubahan ke database
        $resep->save();

        // Redirect kembali ke daftar resep dengan pesan sukses
        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui!');
    }

    // Menghapus data resep
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        // Hapus file gambar dari folder jika ada
        if ($resep->gambar && file_exists(public_path('gambar/' . $resep->gambar))) {
            unlink(public_path('gambar/' . $resep->gambar));
        }

        // Hapus data resep dari database
        $resep->delete();

        // Redirect ke list resep dengan pesan sukses
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus!');
    }
}
