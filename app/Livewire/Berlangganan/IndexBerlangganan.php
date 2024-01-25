<?php

namespace App\Livewire\Berlangganan;

use App\Models\Berlangganan;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Berlangganan')]
class IndexBerlangganan extends Component
{
    use WithPagination;

    public $perPage = 25;
    public $search = '';

    #[Validate('date|before_or_equal:finish_date')]
    public $date_start;

    #[Validate('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    #[Computed()]
    public function berlangganans()
    {
        return Berlangganan::where('nomor', 'like', '%'.$this->search.'%')
                        ->orderBy('tgl_dikeluarkan', 'desc')
                        ->whereBetween('tgl_dikeluarkan', [$this->date_start, $this->date_end])
                        ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.berlangganan.index-berlangganan');
    }

    public function mount(){
        $this->date_start =  Carbon::today()->subMonth()->toDateString();
        $this->date_end = Carbon::today()->toDateString();
    }
}
