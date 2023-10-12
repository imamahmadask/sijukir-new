<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasis';
    
    protected $fillable = [
        'titik_parkir', 'lokasi_parkir', 'slug', 'jenis_lokasi', 'waktu_pelayanan', 'dasar_ketetapan', 'no_ketetapan',
        'status', 'gambar', 'tgl_registrasi', 'area_id', 'pendaftaran', 'sisi', 'panjang_luas', 'google_maps', 'tgl_ketetapan',
        'is_jukir', 'hari_buka', 'kelurahan_id', 'kord_long', 'kord_lat', 'korlap_id', 'kategori', 'keterangan', 'is_active'
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class);
    }
}
