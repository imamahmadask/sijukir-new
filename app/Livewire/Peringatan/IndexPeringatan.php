<?php

namespace App\Livewire\Peringatan;

use App\Models\Korlap;
use App\Models\Peringatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Peringatan')]
class IndexPeringatan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 25;
    public $filterTipe = '';
    public $filterLunas = '';
    public $filterKorlap = '';
    public $filterBatas;
    public $korlaps;

    #[Validate('date|before_or_equal:finish_date')]
    public $date_start;

    #[Validate('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    #[Computed()]
    public function peringatans()
    {
        $batasEndDate = Carbon::parse($this->filterBatas)->endOfMonth();

        return DB::table('surat_peringatans')
                ->select(
                    'surat_peringatans.id',
                    'surat_peringatans.tipe',
                    'surat_peringatans.tgl_klarifikasi',
                    'jukirs.nama_jukir',
                    'merchant.merchant_name',
                    'lokasis.titik_parkir',
                    'lokasis.lokasi_parkir',
                    'surat_peringatans.jml_kurang_setor',
                    'surat_peringatans.total_bayar',
                    'surat_peringatans.cara_bayar',
                    'surat_peringatans.is_lunas',
                    'surat_peringatans.batas_setor',
                    'korlaps.nama'
                )
                ->leftJoin('jukirs', 'jukirs.id', '=', 'surat_peringatans.jukir_id')
                ->leftJoin('lokasis', 'lokasis.id', '=', 'jukirs.lokasi_id')
                ->leftJoin('merchant', 'merchant.id', '=', 'jukirs.merchant_id')
                ->leftJoin('korlaps', 'korlaps.id', '=', 'lokasis.korlap_id')
                ->where(function ($query) {
                    $query->orWhere('jukirs.nama_jukir', 'like', '%' . $this->search . '%')
                        ->orWhere('merchant.merchant_name', 'like', '%' . $this->search . '%')
                        ->orWhere('lokasis.titik_parkir', 'like', '%' . $this->search . '%');
                })
                ->whereBetween('surat_peringatans.tgl_klarifikasi', [$this->date_start, $this->date_end])
                ->whereBetween('surat_peringatans.batas_setor', [$this->date_start, $batasEndDate])
                ->where(function ($query) {
                    $query->orWhere(DB::raw("CONCAT(korlaps.id, '', korlaps.nama)"), 'like', '%' . $this->filterKorlap . '%');
                })
                ->where('surat_peringatans.tipe', 'like', '%' . $this->filterTipe . '%')
                ->where('surat_peringatans.is_lunas', 'like', '%' . $this->filterLunas . '%')
                ->orderBy('surat_peringatans.tgl_klarifikasi', 'desc')
                ->distinct()
                ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.peringatan.index-peringatan');
    }

    public function mount(){
        $this->date_start =  Carbon::today()->subMonth()->toDateString();
        $this->date_end = Carbon::today()->toDateString();
        $this->korlaps = Korlap::select('id', 'nama')->orderBy('nama', 'asc')->get();
        $this->filterBatas = Carbon::now()->format('Y-m');

    }

    public function deletePeringatan(Peringatan $peringatan){
        $peringatan->delete();

        session()->flash('success', 'Data Peringatan Berhasil Dihapus.');

    }
}
