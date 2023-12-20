<?php

namespace App\Livewire\Jukir\Pembantu;

use App\Models\JukirPembantu;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ListPembantu extends Component
{
    public $jukir_id;

    public function render()
    {
        return view('livewire.jukir.pembantu.list-pembantu');
    }

    #[Computed()]
    public function jukpems()
    {
        return JukirPembantu::where('jukir_id', $this->jukir_id)
                            ->get();
    }
}
