<?php

namespace App\Livewire\Peringatan;

use App\Models\Peringatan;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Peringatan')]
class IndexPeringatan extends Component
{
    #[Computed()]
    public function peringatans()
    {
        return Peringatan::simplePaginate(25);
    }

    public function render()
    {
        return view('livewire.peringatan.index-peringatan');
    }

    public function deletePeringatan(Peringatan $peringatan){
        $peringatan->delete();

        session()->flash('success', 'Data Peringatan Berhasil Dihapus.');

    }
}
