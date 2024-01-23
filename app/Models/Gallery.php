<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = "galleries";

    protected $fillable = [
        'kode', 'judul', 'slug', 'deskripsi', 'kategori',
        'tanggal', 'gambar', 'created_by', 'edited_by'
    ];

    protected $casts = [
        'gambar' => 'array'
    ];
}
