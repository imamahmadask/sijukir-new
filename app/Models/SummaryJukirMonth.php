<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryJukirMonth extends Model
{
    use HasFactory;

    protected $table = "summary_jukir_month";

    protected $fillable = [
        'jukir_id',
        'bulan',
        'tahun',
        'potensi',
        'jml_trx',
        'tunai',
        'non_tunai',
        'total',
        'kurang_setor'
    ];
}
