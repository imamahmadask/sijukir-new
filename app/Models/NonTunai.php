<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NonTunai extends Model
{
    use HasFactory;

    protected $table = "trans_non_tunai";

    protected $fillable = [
        'tgl_transaksi', 'bulan', 'tahun', 'merchant_name', 'issuer_name',
        'syslog', 'total_nilai', 'status', 'filename', 'info', 'settlement',
        'merchant_id', 'area_id', 'kecamatan'
    ];

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
