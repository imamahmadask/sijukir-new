<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriJukir extends Model
{
    use HasFactory;

    protected $table = "histori_jukir";

    protected $fillable = [
        'jukir_id', 'tgl_histori', 'no_surat', 'jenis_histori', 'histori',
        'created_by', 'edited_by'
    ];

    public function jukir(): BelongsTo
    {
        return $this->belongsTo(Jukir::class);
    }
}
