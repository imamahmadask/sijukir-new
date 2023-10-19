<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Jukir')]
class IndexJukir extends Component
{
    public function render()
    {
        $jukirs = Jukir::with('lokasi')->get();
        
        return view('livewire.jukir.index-jukir', [
            'jukirs' => $jukirs
        ]);
    }
}
