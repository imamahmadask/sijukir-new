<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Korlap Detail')]
class ShowKorlap extends Component
{
    public Korlap $korlap;

    public function render()
    {
        return view('livewire.korlap.show-korlap');
    }
}
