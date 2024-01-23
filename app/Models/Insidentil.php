<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insidentil extends Model
{
    use HasFactory;

    protected $table = "insidentil";

    protected $fillable = [
        'tgl_pendaftaran', 'nik', 'nama', 'alamat', 'tempat_lahir',
        'tgl_lahir', 'jk', 'agama', 'pekerjaan', 'telepon', 'jenis_izin',
        'nama_perusahaan', 'alamat_perusahaan', 'akta_perusahaan', 'npwp_perusahaan',
        'nama_acara', 'lokasi_acara', 'jumlah_hari', 'tgl_awal_acara', 'tgl_akhir_acara',
        'waktu_acara', 'lokasi_parkir', 'kriteria_lokasi', 'luas_lokasi', 'r2', 'r4',
        'potensi', 'setoran', 'dokumen', 'keterangan', 'status', 'merchant_id', 'tgl_surat', 'no_surat'
    ];

}
