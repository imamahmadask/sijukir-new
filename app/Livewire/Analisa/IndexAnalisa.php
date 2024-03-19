<?php

namespace App\Livewire\Analisa;

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
                    ->select(
                        DB::raw("jukirs.id, jukirs.nama_jukir, jukirs.status, jukirs.kode_jukir,
                                lokasis.titik_parkir, lokasis.lokasi_parkir, korlaps.nama, merchants.merchant_name,
                                summary_jukir_month.potensi, summary_jukir_month.jml_trx, summary_jukir_month.non_tunai as Total,
                                summary_jukir_month.kurang_setor,
                                IF(DATE_FORMAT(jukirs.tgl_pkh_upl, '%Y-%m') <= '$this->bulan', jukirs.uji_petik, jukirs.potensi_harian) as PotensiHarian")
                    )
                    ->leftJoin('lokasis', 'jukirs.lokasi_id', 'lokasis.id')
                    ->leftJoin('merchants', 'jukirs.merchant_id', 'merchants.id')
                    ->leftJoin('korlaps', 'korlaps.id', 'lokasis.korlap_id')
                    ->leftJoin('summary_jukir_month', 'jukirs.id', 'summary_jukir_month.jukir_id')
                    ->where('summary_jukir_month.tahun', $this->pecah_bulan[0])
                    ->where('summary_jukir_month.bulan', $this->pecah_bulan[1])
                    ->where(function ($query) {
                        $query->where('jukirs.nama_jukir', 'like', '%'.$this->search.'%')
                                ->orWhere('merchants.merchant_name', 'like', '%'.$this->search.'%')
                                ->orWhere('lokasis.titik_parkir', 'like', '%'.$this->search.'%');
                    })
                    ->where(function ($query) {
                        $query->where('korlaps.id', $this->filterKorlap);
                    })
                    ->where('jukirs.ket_jukir', '!=', 'Non Active')
                    ->orderBy('Total', 'Desc')
                    ->orderBy('jukirs.nama_jukir', 'Asc')
                    ->get();
    }

    public function mount()
    {
        $this->korlaps = Korlap::select('id', 'nama')->orderBy('nama', 'asc')->get();

        $this->filterKorlap = $this->korlaps->first()->id;

        $this->bulan = Carbon::now()->subMonth()->format('Y-m');
    }
}
