<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Component;
use Livewire\Attributes\Title;


class IndexKorlap extends Component
{
    
    #[Title('Korlap')]
    public function render()
    {
        $korlaps = Korlap::all();

        return view('livewire.korlap.index-korlap', [
            'korlaps' => $korlaps
        ]);
    }
}
