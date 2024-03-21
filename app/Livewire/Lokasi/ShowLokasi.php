<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lokasi Detail')]
class ShowLokasi extends Component
{
    public Lokasi $lokasi;

    public function render()
    {
        $kordinat = array(
            0 => $this->lokasi->kord_lat,
            1 => $this->lokasi->kord_long,
            2 => $this->lokasi->titik_parkir,
            3 => $this->lokasi->lokasi_parkir,
            4 => $this->lokasi->google_maps
        );

        return view('livewire.lokasi.show-lokasi', compact('kordinat'));
    }
}
