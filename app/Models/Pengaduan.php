<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = "pengaduan";

    protected $fillable = [
        'nama', 'telepon', 'pesan', 'titik', 'lokasi',
        'jenis', 'foto', 'status', 'saran', 'tgl_diproses',
        'tgl_selesai_proses', 'edited_by'
    ];
}
