<?php

namespace App\Jobs;

use App\Models\Jukir;
use App\Models\NonTunai;
use App\Models\SummaryJukirMonth;
use App\Models\Tunai;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateSummaryJukir implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $tries = 25;
    public $timeout = 300;

    protected $jukirId;
    protected $tahun;
    protected $bulan;

    public function __construct($jukirId, $bulan, $tahun)
    {
        $this->jukirId = $jukirId;
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $potensi_bulanan = 0;

        $jukir = Jukir::find($this->jukirId);

        $summary_bulan = SummaryJukirMonth::whereHas('jukir', function($q) {
                            $q->where('id', $this->jukirId);
                        })->where('bulan', $this->bulan)
                        ->where('tahun', $this->tahun)
                        ->first();

        $non_tunai = NonTunai::selectRaw('SUM(total_nilai) as total, COUNT(total_nilai) as jumlah')
            ->where(function ($query) use ($jukir) {
                $query->where('merchant_id', $jukir->merchant_id)
                    ->orWhere('merchant_id', $jukir->old_merchant_id);
            })
            ->where('bulan', $this->bulan)
            ->where('tahun', $this->tahun)
            ->where('status', 'SUCCEED')
            ->first();

        $total_non_tunai = $non_tunai->total ?? 0;
        $jumlah_non_tunai = $non_tunai->jumlah ?? 0;

        $potensi_bulanan = ($jukir->potensi_bulanan_upl > 0) ? $jukir->potensi_bulanan_upl : $jukir->potensi_bulanan;

        $tunai = Tunai::where('jukir_id', $this->jukirId)
            ->whereYear('tgl_transaksi', $this->tahun)
            ->whereMonth('tgl_transaksi', $this->bulan)
            ->sum('jumlah_transaksi');

        $potensi = ($jukir->ket_jukir == 'Non Active') ? 0 : $potensi_bulanan;

        $summaryData = [
            'jukir_id' => $this->jukirId,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'potensi' => $potensi,
            'jml_trx' => $jumlah_non_tunai,
            'tunai' => $tunai,
            'non_tunai' => $total_non_tunai,
            'total' => $tunai + $total_non_tunai,
            'kurang_setor' => $total_non_tunai - $potensi
        ];

        if ($summary_bulan) {
            $summary_bulan->update($summaryData);
        } else {
            SummaryJukirMonth::create($summaryData);
        }

        info("Update Summary Jukir Success for Jukir ID: $this->jukirId");

    }
}
