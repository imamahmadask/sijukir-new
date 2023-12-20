<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jukir extends Model
{
    use HasFactory;

    protected $table = 'jukirs';

    protected $fillable = [
        'kode_jukir', 'nik_jukir', 'nama_jukir', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin',
        'alamat', 'kel_alamat', 'kec_alamat', 'kab_kota_alamat', 'telepon', 'agama', 'jenis_jukir',
        'no_perjanjian', 'tgl_perjanjian', 'tgl_akhir_perjanjian', 'tgl_terbit_qr', 'status',
        'potensi_harian', 'potensi_bulanan', 'uji_petik', 'potensi_bulanan_upl', 'tgl_pkh_upl',
        'waktu_kerja', 'jml_hari_kerja', 'hari_kerja_bulan', 'hari_libur', 'foto', 'document',
        'ket_jukir', 'area_id', 'lokasi_id', 'merchant_id', 'tgl_nonactive'
    ];

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }

    public function tunai(): HasMany
    {
        return $this->hasMany(Tunai::class);
    }

    public function histori(): HasMany
    {
        return $this->hasMany(HistoriJukir::class)->orderBy('tgl_histori', 'Desc');
    }

    public function totalSetoran(){
        return $this->totalTunai() + $this->totalNonTunai();
    }

    public function totalTap(){
        if($this->status == "Non-Tunai"){
            $total_tap = $this->merchant->nontunai()->where('status', 'SUCCEED')->count('id');
        }else{
            $total_tap = 0;
        }
        return $total_tap;
    }

    public function totalNonTunai(){
        if($this->status == "Non-Tunai"){
            $non_tunai = $this->merchant->nontunai()->where('status', 'SUCCEED')->sum('total_nilai');
        }else{
            $non_tunai = 0;
        }

        return $non_tunai;
    }

    public function totalTunai(){
        $tunai = $this->tunai()->sum('jumlah_transaksi');
        return $tunai;
    }
}
