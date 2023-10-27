<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tunai extends Model
{
    use HasFactory;

    protected $table = "trans_tunai";

    protected $fillable = [
        'tgl_transaksi', 'jumlah_transaksi', 'no_kwitansi', 'jukir_id', 'area_id',
        'selisih', 'type', 'keterangan'
    ];

    public function jukir(): BelongsTo
    {
        return $this->belongsTo(Jukir::class);
    }
}
