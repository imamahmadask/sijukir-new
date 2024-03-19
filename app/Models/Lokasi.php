<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasis';

    protected $fillable = [
        'titik_parkir',
        'lokasi_parkir',
        'slug',
        'jenis_lokasi',
        'waktu_pelayanan',
        'dasar_ketetapan',
        'no_ketetapan',
        'status',
        'gambar',
        'tgl_registrasi',
        'area_id',
        'pendaftaran',
        'sisi',
        'panjang_luas',
        'google_maps',
        'tgl_ketetapan',
        'is_jukir',
        'hari_buka',
        'kelurahan_id',
        'kord_long',
        'kord_lat',
        'korlap_id',
        'kategori',
        'keterangan',
        'is_active'
    ];

    public function jukir(): HasMany
    {
        return $this->hasMany(Jukir::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function korlap(): BelongsTo
    {
        return $this->belongsTo(Korlap::class);
    }

    public function cekIsJukir()
    {
        $isJukir = Lokasi::doesntHave('jukir')->count();
        return $isJukir;
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($lokasi) { // before delete() method call this
             $lokasi->jukir()->each(function($jukir) {
                $jukir->delete(); // <-- direct deletion
             });
        });
    }

    public function getSetoran()
    {
        $total = DB::table('jukirs')
                ->where('lokasi_id', $this->id)
                ->join('lokasis', 'lokasis.id', '=', 'jukirs.lokasi_id')
                ->join('summary_jukir_month', 'jukirs.id', '=', 'summary_jukir_month.jukir_id')
                ->sum('summary_jukir_month.total');
        return $total;
    }
}
