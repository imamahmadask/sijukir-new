<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berlangganan extends Model
{
    use HasFactory;

    protected $table = "parkir_berlangganans";

    protected $fillable = [
        'nomor', 'jenis', 'nama', 'no_pol', 'alamat', 'status', 'jumlah',
        'masa_berlaku', 'awal_berlaku', 'akhir_berlaku', 'tgl_dikeluarkan', 'keterangan'
    ];
}
