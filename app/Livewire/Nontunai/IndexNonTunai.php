<?php

namespace App\Livewire\Nontunai;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Non-Tunai')]
class IndexNonTunai extends Component
{
    public function render()
    {
        return view('livewire.nontunai.index-nontunai');
    }
}
