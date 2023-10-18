<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Lokasi')]
class IndexLokasi extends Component
{
    use WithPagination;

    public $lokasiId, $lokasi_name;

    public function render()
    {        
        $lokasis = Lokasi::orderBy('titik_parkir', 'Asc')->simplePaginate(10);
        
        return view('livewire.lokasi.index-lokasi', [
            'lokasis' => $lokasis
        ]);
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

        //redirect
        return redirect()->route('lokasi.index');        
    }
   
}
