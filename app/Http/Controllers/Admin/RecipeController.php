<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
   public function index()
{
    $reseps = \App\Models\Resep::latest()->get(); // urut terbaru
    return view('admin.reseps.index', compact('reseps'));
}

    public function create()
    {
        return view('admin.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'asal_negara' => 'required|string|max:255',
        'pencipta' => 'required|string|max:255',
        'cara_membuat' => 'required|string',
        'link_youtube' => 'nullable|url',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'kategori' => 'required|string|in:makanan,minuman,dessert',
    ]);

    // ✅ Upload gambar ke folder storage/app/public/reseps
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('reseps', 'public'); // <-- INI kode masukin gambarnya
        $validated['gambar'] = $path;
    }

    \App\Models\Resep::create($validated);

    return redirect()->route('admin.dashboard')->with('success', 'Resep berhasil ditambahkan!');
}

    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        return view('admin.edit', compact('resep'));
    }

   public function update(Request $request, $id)
{
    $resep = \App\Models\Resep::findOrFail($id);

    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'asal_negara' => 'required|string|max:255',
        'pencipta' => 'required|string|max:255',
        'cara_membuat' => 'required|string',
        'link_youtube' => 'nullable|url',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'kategori' => 'required|string|in:makanan,minuman,dessert',
    ]);

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($resep->gambar && \Storage::disk('public')->exists($resep->gambar)) {
            \Storage::disk('public')->delete($resep->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('gambar')->store('reseps', 'public');
        $validated['gambar'] = $path;
    }

    $resep->update($validated);

    return redirect()->route('admin.dashboard')->with('success', 'Resep berhasil diperbarui!');
}


    public function destroy($id)
{
    $resep = \App\Models\Resep::findOrFail($id);

    // Hapus gambar jika ada
    if ($resep->gambar && \Storage::disk('public')->exists($resep->gambar)) {
        \Storage::disk('public')->delete($resep->gambar);
    }

    $resep->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Resep berhasil dihapus!');
}
}
