<?php

namespace App\Http\Controllers;

use App\Models\Resep;

class PublicResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::latest()->get();
        return view('public.index', compact('reseps'));
    }

    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        return view('public.show', compact('resep'));
    }
}
