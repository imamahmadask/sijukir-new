<?php

namespace App\Livewire\Lokasi;

use App\Models\Area;
use App\Models\Korlap;
use App\Models\Lokasi;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Lokasi')]
class IndexLokasi extends Component
{
    use WithPagination;
    public $search = '';
    public $filterJenis = '';
    public $filter_area = '';
    public $filter_korlap = '';
    public $is_active = '';
    public $perPage = 25;
    public $areas, $korlaps;
    public $lokasiId, $lokasi_name;

    #[Computed()]
    public function lokasis(){
        return Lokasi::with(['area', 'kelurahan', 'jukir'])
                ->withWhereHas('korlap', function($query){
                    $query->where('nama', 'like', '%'.$this->filter_korlap.'%');
                })
                ->where(function ($query) {
                    $query->where('jenis_lokasi', 'like', '%'.$this->filterJenis.'%');
                })
                ->where(function ($query) {
                    $query->orWhere('is_active', 'like', '%'.$this->is_active.'%');
                })
                ->where(function ($query) {
                    $query->where('lokasi_parkir', 'like', '%'.$this->search.'%')
                            ->orWhere('titik_parkir', 'like', '%'.$this->search.'%')
                            ->orWhere('kategori', 'like', '%'.$this->search.'%');
                })
                ->where(function ($query) {
                    $query->where('area_id', 'like', '%'.$this->filter_area.'%');
                })
                // ->where(function ($query) {
                //     $query->orWhere('pendaftaran', 'like', '%'.$this->pendaftaran.'%');
                // })
                ->orderBy('titik_parkir', 'asc')
                ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.lokasi.index-lokasi');
    }

    public function deleteLokasi($id){
        $this->lokasiId = $id;

        $this->lokasi_name = Lokasi::where('id', $id)->value('titik_parkir');
    }

    public function destroyLokasi()
    {
        if($this->lokasiId){
            $lokasi = Lokasi::findOrFail($this->lokasiId);

            //destroy
            $lokasi->delete();

            unlink("storage/".$lokasi->gambar);
        }

        //flash message
        session()->flash('delete', 'Data Lokasi Berhasil Dihapus.');

    }

    public function mount(){
        $this->areas = Area::all();
        $this->korlaps = Korlap::all();
    }

}
