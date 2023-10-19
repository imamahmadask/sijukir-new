<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jukir extends Model
{
    use HasFactory;

    protected $table = 'jukirs';

    protected $fillable = [
        'kode_jukir', 'nik_jukir', 'nama_jukir', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin',
        'alamat', 'kel_alamat', 'kec_alamat', 'kab_kota_alamat', 'telepon', 'agama', 'jenis_jukir',
        'no_perjanjian', 'tgl_perjanjian', 'tgl_akhir_perjanjian', 'tgl_terbit_qr', 'status',
        'potensi_harian', 'potensi_bulanan', 'uji_petik', 'potensi_bulanan_upl', 'tgl_pkh_upl', 
        'waktu_kerja', 'jml_hari_kerja', 'hari_kerja_bulan', 'hari_libur', 'foto', 'document',
        'ket_jukir', 'area_id', 'lokasi_id', 'merchant_id', 'tgl_nonactive'
    ];    

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
