<?php

namespace App\Livewire\Insidentil;

use App\Models\Insidentil;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Insidentil')]
class ShowInsidentil extends Component
{

    public Insidentil $insidentil;

    public function render()
    {
        return view('livewire.insidentil.show-insidentil');
    }
}
