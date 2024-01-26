<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class target extends Model
{
    use HasFactory;

    protected $table = "target";

    protected $fillable = [
        'tahun',
        'target',
        'pencapaian',
        'selisih',
        'persentase',
        'penangguhan_sebelum',
        'penangguhan_sesudah',
    ];
}
