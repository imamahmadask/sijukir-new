<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peringatan extends Model
{
    use HasFactory;

    protected $table = "surat_peringatans";

    protected $fillable = [
        'tipe', 'tgl_klarifikasi', 'riwayat', 'kompensasi', 'jml_kurang_setor',
        'total_bayar', 'batas_setor', 'cara_bayar', 'banyak_cicilan', 'cicilan',
        'ket', 'no_surat', 'is_lunas', 'jukir_id', 'created_by', 'edited_by'
    ];

    protected $casts = [
        'riwayat' => 'array',
        'cicilan' => 'array',
    ];

    public function jukir(): BelongsTo
    {
        return $this->belongsTo(Jukir::class);
    }

    public function histori_peringatan(): HasMany
    {
        return $this->hasMany(HistoriPeringatan::class, 'surat_peringatan_id');
    }
}
