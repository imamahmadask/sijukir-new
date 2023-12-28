<?php

namespace App\Livewire\Pengaduan;

use App\Models\Pengaduan;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengaduan')]
class IndexPengaduan extends Component
{
    public function render()
    {
        return view('livewire.pengaduan.index-pengaduan');
    }

    #[Computed()]
    public function pengaduans()
    {
        return Pengaduan::all();
    }
}
