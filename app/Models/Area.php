<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function lokasi(){
        return $this->hasMany(Lokasi::class);
    }    

    public function kelurahan(){
        return $this->hasMany(Lokasi::class);
    }
}
