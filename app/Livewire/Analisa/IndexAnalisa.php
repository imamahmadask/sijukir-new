<?php

namespace App\Livewire\Analisa;

use App\Models\Jukir;
use App\Models\Korlap;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Analisa Korlap')]
class IndexAnalisa extends Component
{
    public $perPage = 100;
    public $filterKorlap;
    public $search = '';
    public $korlaps;
    public $bulan, $pecah_bulan;
    public $namaKorlap;

    public function render()
    {
        $this->pecah_bulan = explode("-", $this->bulan);
        $this->namaKorlap = Korlap::where('id', $this->filterKorlap)->value('nama');

        return view('livewire.analisa.index-analisa');
    }

    #[Computed()]
    public function analisa()
    {
        return DB::table('jukirs')
                    ->select(DB::raw("jukirs.id, jukirs.nama_jukir, jukirs.status, jukirs.kode_jukir, jukirs.ket_jukir,
                    lokasis.titik_parkir, lokasis.lokasi_parkir, korlaps.nama, merchants.merchant_name,
                    COUNT(trans_non_tunai.total_nilai) as Total_Tap,
                    SUM(trans_non_tunai.total_nilai) as Total,
                    IF(DATE_FORMAT(jukirs.tgl_pkh_upl, '%Y-%m') <= '$this->bulan', jukirs.uji_petik, jukirs.potensi_harian) as PotensiHarian,
                    IF(DATE_FORMAT(jukirs.tgl_pkh_upl, '%Y-%m') <= '$this->bulan', jukirs.potensi_bulanan_upl, jukirs.potensi_bulanan) as PotensiBulanan"))
                    ->leftJoin('lokasis', 'jukirs.lokasi_id', 'lokasis.id')
                    ->leftJoin('merchants', 'jukirs.merchant_id', 'merchants.id')
                    ->leftJoin('korlaps', 'korlaps.id', 'lokasis.korlap_id')
                    ->leftJoin('trans_non_tunai', function ($join) {
                        $join->on('jukirs.merchant_id', '=', 'trans_non_tunai.merchant_id')
                            ->whereYear('trans_non_tunai.tgl_transaksi', $this->pecah_bulan[0])
                            ->whereMonth('trans_non_tunai.tgl_transaksi', $this->pecah_bulan[1]);
                    })
                    ->where(function ($query) {
                        $query->where('jukirs.nama_jukir', 'like', '%'.$this->search.'%')
                                ->orWhere('merchants.merchant_name', 'like', '%'.$this->search.'%')
                                ->orWhere('lokasis.titik_parkir', 'like', '%'.$this->search.'%');
                    })
                    ->where(function ($query) {
                        // $query->where('korlaps.id', 4);
                        $query->where('korlaps.id', $this->filterKorlap);
                    })
                    ->where('jukirs.ket_jukir', '!=', 'Non Active')
                    ->orderBy('Total', 'Desc')
                    ->orderBy('jukirs.nama_jukir', 'Asc')
                    ->groupBy('jukirs.id')
                    ->get();
    }

    public function mount()
    {
        $this->korlaps = Korlap::all();

        $this->filterKorlap = $this->korlaps->first()->id;

        $this->bulan = Carbon::now()->subMonth()->format('Y-m');
    }

    public function totalBulan($merchant_id, $bulan){
        $pecah_bulan = explode("-", $bulan);

        if($merchant_id > 1000){
            $total = DB::table('trans_non_tunai')
                    ->where('merchant_id', $merchant_id)
                    ->whereYear('tgl_transaksi',$pecah_bulan[0])
                    ->whereMonth('tgl_transaksi',$pecah_bulan[1])
                    ->sum('total_nilai');
        }
        else {
            $total = 0;
        }
        return $total;
    }
}
