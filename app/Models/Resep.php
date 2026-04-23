<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'nama',
        'asal_negara',
        'pencipta',
        'cara_membuat',
        'link_youtube',
        'gambar',
        'kategori',
    ];
}
