<?php

namespace App\Livewire\Jukir\Histori;

use App\Models\HistoriJukir;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ListHistori extends Component
{
    public $jukir_id;

    #[Computed()]
    public function histories()
    {
        return HistoriJukir::where('jukir_id', $this->jukir_id)
                            ->orderBy('tgl_histori', 'Desc')
                            ->orderBy('created_at', 'Desc')
                            ->get();
    }

    // #[On('histori-created')]
    // public function updateList(){
    //     return HistoriJukir::where('jukir_id', $this->jukir_id)->get();
    // }

    public function render()
    {
        return view('livewire.jukir.histori.list-histori');
    }
}
