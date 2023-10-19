<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Title('Korlap')]
class IndexKorlap extends Component
{
    public $korlapId, $korlap_name;
    
    #[On('korlap-deleted')]
    public function updateList(Korlap $korlap){

    }

    public function render()
    {
        $korlaps = Korlap::all();

        return view('livewire.korlap.index-korlap', [
            'korlaps' => $korlaps
        ]);
    }

    public function deleteKorlap($id){
        $this->korlapId = $id;

        $this->korlap_name = Korlap::where('id', $id)->value('nama');
    }

    public function destroyKorlap()
    {       
        if($this->korlapId){
            $korlap = Korlap::findOrFail($this->korlapId);
    
            //destroy
            $korlap->delete();
            
            unlink("storage/".$korlap->foto);
        }

        //flash message
        session()->flash('delete', 'Data Korlap Berhasil Dihapus.');     

        $this->dispatch('korlap-deleted' );
    }
}
