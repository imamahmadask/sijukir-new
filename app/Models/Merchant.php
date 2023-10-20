<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Merchant extends Model
{
    use HasFactory;

    protected $table = "merchants";

    protected $fillable = [
        'id', 'nmid', 'merchant_name', 'no_rekening', 'vendor', 'qris', 'tgl_terdaftar', 'area_id'
    ];

    public function jukir(): HasOne
    {
        return $this->hasOne(Jukir::class);
    }
}
