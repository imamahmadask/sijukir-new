<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JukirPembantu extends Model
{
    use HasFactory;

    protected $table = "jukir_pembantu";

    protected $fillable = [
        'nama', 'nik', 'alamat', 'kel_alamat', 'kec_alamat', 'kab_kota_alamat',
        'telepon', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'foto',
        'status', 'jukir_id'
    ];
}
