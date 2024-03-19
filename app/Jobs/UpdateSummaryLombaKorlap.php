<?php

namespace App\Jobs;

use App\Models\SummaryLombaKorlap;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateSummaryLombaKorlap implements ShouldQueue
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
        $results = DB::table('korlaps')
            ->select(
                'korlaps.nama', 'korlaps.id',
                DB::raw('COUNT(DISTINCT CASE WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 100000 THEN jukirs.id END) as kategori_1'),
                DB::raw('COUNT(DISTINCT CASE WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 35000 AND IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) <= 100000 THEN jukirs.id END) as kategori_2'),
                DB::raw('COUNT(DISTINCT CASE WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) <= 35000 THEN jukirs.id END) as kategori_3'),
                DB::raw('COUNT(DISTINCT jukirs.id) as total_jukir'),
                DB::raw('SUM(CASE
                            WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 100000 THEN jukirs.hari_kerja_bulan * 50
                            WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 35000 AND IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) <= 100000 THEN jukirs.hari_kerja_bulan * 35
                            ELSE jukirs.hari_kerja_bulan * 25
                        END) as potensi_tap'),
                DB::raw('SUM(summary_jukir_month.jml_trx) as perolehan_tap'),
                DB::raw('SUM(summary_jukir_month.non_tunai) as perolehan_nominal'),
                DB::raw('IFNULL(SUM(summary_jukir_month.jml_trx) / NULLIF(SUM(CASE
                        WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 100000 THEN jukirs.hari_kerja_bulan * 50
                        WHEN IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) > 35000 AND IF(jukirs.uji_petik > 0, jukirs.uji_petik, jukirs.potensi_harian) <= 100000 THEN jukirs.hari_kerja_bulan * 35
                        ELSE jukirs.hari_kerja_bulan * 25
                        END), 0), 0) * 100 as persentase')
            )
            ->leftJoin('lokasis', 'korlaps.id', '=', 'lokasis.korlap_id')
            ->leftJoin('jukirs', 'lokasis.id', '=', 'jukirs.lokasi_id')
            ->leftJoin('summary_jukir_month', 'jukirs.id', '=', 'summary_jukir_month.jukir_id')
            ->whereBetween('summary_jukir_month.bulan', [$this->bulan, $this->bulan])
            ->where('summary_jukir_month.tahun', $this->tahun)
            // ->where('jukirs.status', '=', 'Non-Tunai')
            ->groupBy('korlaps.id', 'korlaps.nama')
            ->orderBy('persentase', 'desc')
            ->get();

        foreach($results as $item){
            $cek = SummaryLombaKorlap::where('tahun', $this->tahun)
                    ->where('bulan', $this->bulan)
                    ->where('korlap_id', $item->id)
                    ->first();

            $summaryData = [
                'korlap_id' => $item->id,
                'bulan' =>$this->bulan,
                'tahun' =>$this->tahun,
                'kategori_1' => $item->kategori_1,
                'kategori_2' => $item->kategori_2,
                'kategori_3' => $item->kategori_3,
                'total_jukir' => $item->total_jukir,
                'potensi_tap' => $item->potensi_tap,
                'target_tap' => $item->potensi_tap * 0.7,
                'perolehan_tap' => $item->perolehan_tap,
                'perolehan_nominal' => $item->perolehan_nominal,
                'persentase' => $item->perolehan_tap/($item->potensi_tap * 0.7) * 100,
            ];

            if($cek){
                $cek->update($summaryData);
            }else{
                SummaryLombaKorlap::create($summaryData);
            }

            $cek13 = SummaryLombaKorlap::where('tahun', $this->tahun)
                    ->where('bulan', 13)
                    ->where('korlap_id', $item->id)
                    ->first();

            if($cek13){
                $data = SummaryLombaKorlap::selectRaw('SUM(perolehan_tap) AS total_tap, SUM(perolehan_nominal) AS total_nominal,
                SUM(potensi_tap) AS potensi, SUM(target_tap) AS target')
                ->where('korlap_id', $item->id)
                ->where('tahun', $this->tahun)
                ->where('bulan', '!=', 13)
                ->first();

                $cek13->update([
                    'potensi_tap' => $data->potensi,
                    'target_tap' => $data->target,
                    'perolehan_tap' => $data->total_tap,
                    'perolehan_nominal' => $data->total_nominal,
                    'persentase' => ($data->total_tap / ($data->potensi * 0.7)) * 100
                ]);
            }
        }
    }
}
