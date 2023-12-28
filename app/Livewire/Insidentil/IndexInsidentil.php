<?php

namespace App\Livewire\Insidentil;

use App\Models\Insidentil;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Insidentil')]
class IndexInsidentil extends Component
{
    use WithPagination;

    public $perPage = 25;
    public $search = '';

    #[Computed()]
    public function insidentils()
    {
        return Insidentil::where('nama', 'like', '%'.$this->search.'%')
                        ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.insidentil.index-insidentil');
    }
}
