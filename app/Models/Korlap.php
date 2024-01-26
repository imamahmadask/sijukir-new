<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Korlap extends Model
{
    use HasFactory;

    protected $table = "korlaps";

    protected $fillable = [
        'nama', 'nik', 'alamat', 'telepon', 'foto', 'created_by', 'edited_by'
    ];

    public function lokasi(): HasMany
    {
        return $this->hasMany(Lokasi::class);
    }

    public function getArea(){
        $area = DB::table('lokasis')->select('areas.Kecamatan as Area')
                    ->where('lokasis.korlap_id', $this->id)
                    ->join('areas', 'areas.id', '=', 'lokasis.area_id')
                    ->groupBy('area_id')->get();

        return json_decode($area);
    }

    public function getSetoran(){
        $total = DB::table('jukirs')->where('lokasis.korlap_id', $this->id)
                    ->join('lokasis', 'lokasis.id', '=', 'jukirs.lokasi_id')
                    ->join('summary_jukir_month', 'jukirs.id', '=', 'summary_jukir_month.jukir_id')
                    ->sum('summary_jukir_month.total');

        return $total;
    }

    public function getLokasi(){
        $lokasi = Lokasi::with(['korlap', 'area', 'kelurahan'])
                        ->with('jukir', function($query){
                            $query->with('merchant');
                        })
                        ->where('korlap_id', $this->id)
                        ->get();

        return $lokasi;
    }

    public function getJumlahLokasi(){
        $jml = Lokasi::where('korlap_id', $this->id)
                    ->count('id');

        return $jml;
    }

    public function getJumlahJukir(){
        $jml = Lokasi::withCount(['jukir' => function ($query) {
                            $query->where('ket_jukir', 'Active');
                        }])
                        ->where('korlap_id', $this->id)
                        ->get();

        return $jml->sum('jukir_count');
    }
}
