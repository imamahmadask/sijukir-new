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

class UpdateJukirPerMonth implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 25;
    public $timeout = 300;

    protected $vendor;
    protected $tahun;
    protected $bulan;
    protected $jukir_id;

    public function __construct($vendor, $bulan, $tahun)
    {
        $this->vendor = $vendor;
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $jukirs = Jukir::selectRaw('id')
            ->withWhereHas('merchant', function ($query) {
                $query->where('vendor', $this->vendor);
            })
            ->cursor();

        foreach ($jukirs as $jukir) {
            UpdateSummaryJukir::dispatch($jukir->id, $this->bulan, $this->tahun);
        }

        info('Update Summary Jukir Per month Success');
    }
}
