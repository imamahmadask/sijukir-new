<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryMonth extends Model
{
    use HasFactory;

    protected $table = "summary_by_month";

    protected $fillable = [
        'bulan',
        'tahun',
        'tunai',
        'jml_trx',
        'non_tunai',
        'berlangganan',
        'insidentil',
        'total',
        'max_createdAt'
    ];
}
