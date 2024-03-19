<?php

namespace App\Jobs;

use App\Models\Area;
use App\Models\Jukir;
use App\Models\NonTunai;
use App\Models\SummaryArea;
use App\Models\SummaryAreaMonth;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateSummaryArea implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $areas = Area::all();

        $awal = Carbon::parse('2021-01')->startOfMonth();
        $akhir = Carbon::parse($this->tahun.'-'.$this->bulan)->endOfMonth();

        foreach ($areas as $data) {
            $potensi = Jukir::where('area_id', $data->id)
                            ->whereBetween('tgl_perjanjian', [$awal, $akhir])
                            ->where('ket_jukir', '!=', 'Non Active')
                            ->sum(DB::raw('IF(potensi_bulanan_upl > 0, potensi_bulanan_upl, potensi_bulanan)'));

            $nontunai = NonTunai::where('area_id', $data->id)->where('bulan', $this->bulan)
                        ->where('tahun', $this->tahun)
                        ->where('status', 'SUCCEED')
                        ->sum('total_nilai');

            $jml_trx = NonTunai::where('area_id', $data->id)->where('bulan', $this->bulan)
                        ->where('tahun', $this->tahun)
                        ->where('status', 'SUCCEED')
                        ->count('total_nilai');

            $tunai = SummaryAreaMonth::where('area_id', $data->id)->where('bulan', $this->bulan)->where('tahun', $this->tahun)->value('tunai');

            SummaryAreaMonth::updateOrCreate(
                ['area_id' => $data->id, 'bulan' => $this->bulan, 'tahun' => $this->tahun],
                [
                    'potensi' => $potensi,
                    'tunai' => $tunai,
                    'jml_trx' => $jml_trx,
                    'non_tunai' => $nontunai,
                    'total' => ($tunai + $nontunai),
                    'kurang_setor' => $nontunai - $potensi
                ]
            );

            SummaryArea::updateOrCreate(['area_id' => $data->id, 'tahun' => $this->tahun], [
                'area' => $data->Kecamatan,
                'potensi' => Jukir::where('area_id',$data->id)
                            ->whereYear('tgl_perjanjian', '<=', $this->tahun)
                            ->where('ket_jukir', '!=', 'Non Active')
                            ->sum(DB::raw('IF(potensi_bulanan_upl > 0, potensi_bulanan_upl, potensi_bulanan)')),
                'jml_trx' => SummaryAreaMonth::where('area_id',$data->id)->where('tahun', $this->tahun)->sum('jml_trx'),
                'non_tunai' => SummaryAreaMonth::where('area_id',$data->id)->where('tahun', $this->tahun)->sum('non_tunai'),
                'total' => SummaryAreaMonth::where('area_id',$data -> id)->where('tahun', $this->tahun)->sum('non_tunai') +
                            SummaryAreaMonth::where('area_id', $data->id)->where('tahun', $this->tahun)->sum('tunai'),
                'jukirs' => 0
            ]);
        }

        info('Update Summary Area Success');

    }
}
