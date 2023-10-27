<?php

namespace App\Livewire\Tunai;

use App\Models\Tunai;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

#[Title('Tunai')]
class IndexTunai extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $tunai_name, $tunaiId;

    #[Rule('date|before_or_equal:finish_date')]
    public $date_start;

    #[Rule('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    #[Computed]
    public function tunais() {
        return Tunai::with('jukir')->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.tunai.index-tunai');
    }

    public function mount(){
        // $this->date_start = Carbon::today()->toDateString();
        // $this->date_end =  Carbon::today()->subDays(14)->toDateString();
    }

    public function updatedDateStart($value){
        dd($value);
    }
}
