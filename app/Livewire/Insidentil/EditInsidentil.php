<?php

namespace App\Livewire\Insidentil;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Insidentil')]
class EditInsidentil extends Component
{
    public function render()
    {
        return view('livewire.insidentil.edit-insidentil');
    }
}
