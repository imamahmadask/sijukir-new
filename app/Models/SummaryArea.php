<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryArea extends Model
{
    use HasFactory;

    protected $table = "summary_by_area";

    protected $fillable = [
        'area',
        'tahun',
        'potensi',
        'tunai',
        'jml_trx',
        'non_tunai',
        'total',
        'area_id',
        'jukirs',
    ];
}
