<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Merchant extends Model
{
    use HasFactory;

    protected $table = "merchants";
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    protected $fillable = [
        'id', 'nmid', 'merchant_name', 'no_rekening', 'vendor', 'qris', 'tgl_terdaftar', 'area_id'
    ];

    public function jukir(): HasOne
    {
        return $this->hasOne(Jukir::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function nontunai(): HasMany
    {
        return $this->hasMany(NonTunai::class);
    }
}
