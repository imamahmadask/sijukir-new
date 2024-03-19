<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jukir Detail')]
class ShowJukir extends Component
{
    public Jukir $jukir;

    public $perYear;

    public function render()
    {
        return view('livewire.jukir.show-jukir');
    }
}
