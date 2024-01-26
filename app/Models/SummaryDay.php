<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryDay extends Model
{
    use HasFactory;

    protected $table = "summary_day";

    protected $fillable = [
        'tanggal',
        'jml_transaksi',
        'jml_jukir',
        'total',
        'average_trx'
    ];
}
