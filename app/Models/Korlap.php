<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korlap extends Model
{
    use HasFactory;

    protected $table = "korlaps";

    protected $fillable = [
        'nama', 'nik', 'alamat', 'telepon', 'foto', 'created_by', 'edited_by'
    ];

    public function lokasi(){
        return $this->hasMany(Lokasi::class);
    }
}
