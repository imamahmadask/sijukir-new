<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryLombaKorlap extends Model
{
    use HasFactory;

    protected $table = "summary_lomba_korlap";

    protected $fillable = [
        'korlap_id',
        'bulan',
        'tahun',
        'kategori_1',
        'kategori_2',
        'kategori_3',
        'total_jukir',
        'potensi_tap',
        'target_tap',
        'perolehan_tap',
        'perolehan_nominal',
        'persentase'
    ];
}
