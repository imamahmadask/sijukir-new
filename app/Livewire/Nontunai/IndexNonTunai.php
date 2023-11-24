<?php

namespace App\Livewire\Nontunai;

use App\Models\NonTunai;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Non-Tunai')]
class IndexNonTunai extends Component
{
    public $search ='';
    public $filter ='';
    public $perPage = 25;

    #[Validate('date|before_or_equal:finish_date')]
    public $date_start;

    #[Validate('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    #[Computed()]
    public function nontunai()
    {
        return NonTunai::selectRaw('merchant_name, merchant_id, count(*) as jumlah, sum(total_nilai) as total, info')
                        ->whereBetween('tgl_transaksi', [$this->date_start, $this->date_end])
                        ->where(function ($query) {
                            $query->where('merchant_name', 'like', '%'.$this->search.'%');
                        })
                        ->where('info', 'like', '%'.$this->filter.'%')
                        ->where('status', 'SUCCEED')
                        ->orderBy('info', 'Desc')
                        ->orderBy('merchant_name', 'Asc')
                        ->groupBy('merchant_name', 'merchant_id', 'info')
                        ->simplePaginate($this->perPage);
    }

    public function mount()
    {
        $this->date_start =  Carbon::today()->subDays(14)->toDateString();
        $this->date_end = Carbon::today()->toDateString();
    }

    public function render()
    {
        return view('livewire.nontunai.index-nontunai');
    }
}
