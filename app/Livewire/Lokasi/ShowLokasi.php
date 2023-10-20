<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lokasi Detail')]
class ShowLokasi extends Component
{
    public Lokasi $lokasi;

    public function mount($id){
        $this->lokasi = Lokasi::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.lokasi.show-lokasi');
    }
}
