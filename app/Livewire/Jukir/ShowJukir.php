<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use App\Models\SummaryJukirMonth;
use Carbon\Carbon;
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

    public function mount()
    {
        $this->perYear = (int)Carbon::now()->format('Y');
    }

    public function perBulan($perYear)
    {
        return SummaryJukirMonth::where('jukir_id', $this->jukir->id)
                            ->where('tahun', $perYear)
                            ->orderBy('tahun', 'asc')
                            ->orderBy('bulan', 'asc')
                            ->get();
    }

    public function perTahun()
    {
        return SummaryJukirMonth::selectRaw('tahun, SUM(potensi) as Potensi, SUM(jml_trx) as Jml_Trx, SUM(non_tunai) as NonTunai, SUM(kurang_setor) as Kurang_Setor')
                                    ->where('jukir_id', $this->jukir->id)
                                    ->groupBy('tahun')
                                    ->orderBy('tahun', 'asc')
                                    ->get();
    }
}
