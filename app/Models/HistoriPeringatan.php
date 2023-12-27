<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriPeringatan extends Model
{
    use HasFactory;

    protected $table = "histori_peringatans";
    protected $fillable = ['surat_peringatan_id', 'tanggal', 'jml_setor', 'deskripsi', 'keterangan', 'created_by', 'edited_by'
    ];

    public function surat_peringatan(): BelongsTo
    {
        return $this->belongsTo(SuratPeringatan::class);
    }
}
