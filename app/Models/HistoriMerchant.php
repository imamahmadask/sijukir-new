<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriMerchant extends Model
{
    use HasFactory;

    protected $table = "merchant_histori";

    protected $fillable = [
        'jukir_id',
        'old_merchant_id',
        'new_merchant_id',
        'tanggal_perubahan'
    ];

    public function jukir():BelongsTo
    {
        return $this->belongsTo(Jukir::class);
    }

    public function oldMerchant():BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'old_merchant_id');
    }

    public function newMerchant():BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'new_merchant_id');
    }
}
