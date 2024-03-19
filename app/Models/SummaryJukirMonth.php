<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the jukir that owns the SummaryJukirMonth
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jukir(): BelongsTo
    {
        return $this->belongsTo(Jukir::class, 'foreign_key', 'other_key');
    }
}
