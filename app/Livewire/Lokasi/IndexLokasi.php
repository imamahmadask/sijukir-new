<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class IndexLokasi extends Component
{
    use WithPagination;

    #[Title('Lokasi')]
    public function render()
    {        
        $lokasis = Lokasi::orderBy('titik_parkir', 'Asc')->simplePaginate(10);
        
        return view('livewire.lokasi.index-lokasi', [
            'lokasis' => $lokasis
        ]);
    }
   
}
