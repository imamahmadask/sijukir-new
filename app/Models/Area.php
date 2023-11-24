<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    public function lokasi(): HasMany
    {
        return $this->hasMany(Lokasi::class);
    }

    public function kelurahan(): HasMany
    {
        return $this->hasMany(Lokasi::class);
    }

    public function merchant(): HasMany
    {
        return $this->hasMany(Merchant::class);
    }

    public function area(): HasMany
    {
        return $this->hasMany(NonTunai::class);
    }
}
