<?php

namespace App\Jobs;

use App\Models\Berlangganan;
use App\Models\SummaryMonth;
use App\Models\Tunai;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateSummaryMonth implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $tahun;
    protected $bulan;

    public function __construct($tahun, $bulan)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $nontunai = DB::table('trans_non_tunai')->selectRaw('bulan, tahun,
                    sum(total_nilai) as nontunai, count(total_nilai) as jml_trx, max(tgl_transaksi) as createdAt')
                    ->where('bulan', $this->bulan)
                    ->where('tahun', $this->tahun)
                    ->where('status', 'SUCCEED')
                    ->groupBy('bulan', 'tahun')
                    ->orderBy('createdAt', 'ASC')->get();

        foreach ($nontunai as $data) {
            $summary = SummaryMonth::firstOrCreate([
                'bulan' => $data->bulan,
                'tahun' => $data->tahun
            ]);

            $tunai = Tunai::whereYear('tgl_transaksi', $summary->tahun)
                        ->whereMonth('tgl_transaksi', $summary->bulan)
                        ->sum('jumlah_transaksi');

            $berlangganan = Berlangganan::whereMonth('tgl_dikeluarkan', $summary->bulan)
                        ->whereYear('tgl_dikeluarkan', $summary->tahun)
                        ->sum('jumlah');

            $summary->update([
                'tunai' => $tunai,
                'jml_trx' => $data->jml_trx,
                'non_tunai' => $data->nontunai,
                'berlangganan' => $berlangganan,
                'total' => $tunai + $berlangganan + $data->nontunai,
                'max_createdAt' => $data->createdAt
            ]);
        }

        info('Update Summary Month Success');
    }
}
