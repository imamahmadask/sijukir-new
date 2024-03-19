<?php

namespace App\Jobs;

use App\Models\SummaryDay;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateSummaryDay implements ShouldQueue
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
        $transactions  = DB::table('trans_non_tunai')
                        ->selectRaw('DATE(tgl_transaksi) as Tanggal, count(total_nilai) as Jumlah_Transaksi, sum(total_nilai) as Total_Nilai, COUNT(DISTINCT(merchant_name)) as Jumlah_Jukir')
                        ->where('tahun', $this->tahun)
                        ->where('bulan', $this->bulan)
                        ->where('status', 'SUCCEED')
                        ->groupBy('Tanggal')
                        ->get();

        foreach($transactions as $transaction){
            $summary = SummaryDay::firstOrCreate([
                'tanggal' => $transaction->Tanggal
            ]);

            $summary->jml_transaksi = $transaction->Jumlah_Transaksi;
            $summary->jml_jukir = $transaction->Jumlah_Jukir;
            $summary->total = $transaction->Total_Nilai;
            $summary->average_trx = $summary->total / $summary->jml_transaksi;

            $summary->save();
        }
        info('Update Summary Day Success');
    }
}
