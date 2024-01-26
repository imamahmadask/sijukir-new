<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryAreaMonth extends Model
{
    use HasFactory;

    protected $table = "summary_area_month";

    protected $fillable = [
        'area_id',
        'bulan',
        'tahun',
        'potensi',
        'tunai',
        'jml_trx',
        'non_tunai',
        'total',
        'kurang_setor'
    ];
}
