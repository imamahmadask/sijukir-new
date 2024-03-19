<?php

namespace App\Imports;

use App\Models\Merchant;
use App\Models\NonTunai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ImportNontunai implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithUpserts, WithCustomCsvSettings
{
    private $filename;

    public function  __construct($filename)
    {
        $this->filename = $filename;
    }

    public function model(array $row)
    {
        $merchant = Merchant::find($row['merchant_id']);

        if($merchant){
            $area_id = $merchant->area->id;
            $area = $merchant->area->Kecamatan;

            $dt = $row['tanggal_transaksi'];

            $bulan = Carbon::parse($dt)->format('m');
            $tahun = Carbon::parse($dt)->format('Y');

            return new NonTunai([
                'tgl_transaksi'     => $dt,
                'bulan'             => $bulan,
                'tahun'             => $tahun,
                'merchant_id'       => $row['merchant_id'],
                'merchant_name'     => $row['merchant'],
                'issuer_name'       => $row['issuer_name'],
                'total_nilai'       => $row['nilai_settled'],
                'status'            => $row['status'],
                'syslog'            => $row['tmoney_syslog'],
                'area_id'           => $area_id,
                'kecamatan'         => $area,
                'filename'          => $this->filename,
                'info'              => $row['info'],
                'settlement'        => $row['settlement']
            ]);
        } else {
            abort(404);
        }
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function uniqueBy()
    {
        return 'syslog';
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }

}
