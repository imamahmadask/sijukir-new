<?php

namespace App\Livewire\Peringatan;

use App\Models\Peringatan;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Peringatan Detail')]
class ShowPeringatan extends Component
{
    public Peringatan $peringatan;

    public function render()
    {
        return view('livewire.peringatan.show-peringatan');
    }
}
