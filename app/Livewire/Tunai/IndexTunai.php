<?php

namespace App\Livewire\Tunai;

use App\Models\Tunai;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

#[Title('Tunai')]
class IndexTunai extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $tunai_name, $tunaiId;

    #[Validate('date|before_or_equal:finish_date')]
    public $date_start;

    #[Validate('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    #[Computed()]
    public function tunais()
    {
        return Tunai::with('jukir')
                    ->where(function ($query) {
                        $query->where('no_kwitansi', 'like', '%' . $this->search . '%')
                            ->orWhereHas('jukir', function ($query) {
                                $query->where('nama_jukir', 'like', '%' . $this->search . '%');
                            });
                    })
                    ->whereBetween('tgl_transaksi', [$this->date_start, $this->date_end])
                    ->orderBy('tgl_transaksi', 'desc')
                    ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.tunai.index-tunai');
    }

    public function mount(){
        $this->date_start =  Carbon::today()->subMonth()->toDateString();
        $this->date_end = Carbon::today()->toDateString();
    }

    public function deleteTunai(Tunai $tunai){
        //destroy
        $tunai->delete();

        //flash message
        session()->flash('success', 'Data Transaksi Tunai Berhasil Dihapus.');

    }
}
