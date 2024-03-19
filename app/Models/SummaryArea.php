<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the area that owns the SummaryArea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
