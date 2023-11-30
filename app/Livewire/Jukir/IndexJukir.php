<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Jukir')]
class IndexJukir extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus, $filterArea, $filter = '';
    public $perPage = 25;
    public $areas = [];

    #[Computed()]
    public function jukirs(){
        return DB::table('jukirs')
                    ->select('jukirs.id', 'jukirs.nama_jukir', 'jukirs.status', 'jukirs.kode_jukir','jukirs.ket_jukir', 'lokasis.titik_parkir', 'lokasis.lokasi_parkir',
                    'areas.kecamatan', 'korlaps.nama', 'merchants.merchant_name')
                    ->leftjoin('lokasis', 'lokasis.id', '=', 'jukirs.lokasi_id')
                    ->leftjoin('areas', 'areas.id', '=', 'lokasis.area_id')
                    ->leftjoin('korlaps', 'korlaps.id', '=', 'lokasis.korlap_id')
                    ->leftJoin('merchants', 'merchants.id', '=', 'jukirs.merchant_id')
                    ->where(function ($query) {
                        $query->orWhere('jukirs.nama_jukir', 'like', '%'.$this->search.'%')
                                ->orWhere('jukirs.kode_jukir', 'like', '%'.$this->search.'%')
                                ->orWhere('merchants.merchant_name', 'like', '%'.$this->search.'%')
                                ->orWhere('lokasis.titik_parkir', 'like', '%'.$this->search.'%');
                    })
                    ->where(function ($query) {
                        $query->orWhere('jukirs.status', 'like', $this->filter.'%');
                        $query->orWhere('merchants.vendor', 'like', $this->filter.'%');
                        // $query->orWhere('jukirs.ket_jukir', 'like', $this->active.'%');
                    })
                    ->where(function ($query) {
                        $query->orWhere('jukirs.ket_jukir', 'like', $this->filterStatus.'%');
                    })
                    ->where(function ($query) {
                        $query->orWhere('areas.kode', 'like', '%'.$this->filterArea.'%');
                    })
                    ->orderBy('jukirs.kode_jukir', 'asc')
                    ->simplepaginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.jukir.index-jukir');
    }

    public function mount()
    {
        $this->areas = Area::all();
    }
}
