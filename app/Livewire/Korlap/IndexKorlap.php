<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Title('Korlap')]
class IndexKorlap extends Component
{
    public $korlapId, $korlap_name;
    public $search = '';

    #[Computed()]
    public function korlaps()
    {
        return Korlap::select('id','nama', 'nik', 'telepon', 'alamat')
                            ->where('nama', 'like', '%'.$this->search.'%')
                            ->get();
    }

    public function render()
    {
        return view('livewire.korlap.index-korlap');
    }

    public function deleteKorlap(Korlap $korlap){
        $korlap->delete();

        unlink("storage/".$korlap->foto);


        session()->flash('success', 'Data Korlap Berhasil Dihapus.');

    }
}
