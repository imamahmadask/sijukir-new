<?php

namespace App\Imports;

use App\Models\Area;
use App\Models\Merchant;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\ToModel;

class importMerchant implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithUpserts
{
    public function model(array $row)
    {
        $area_id = Area::where('Kecamatan', $row['kecamatan'])->value('id');
        // $kelurahan_id = Kelurahan::where('kelurahan', $row['kelurahan'])->value('id');

        $data = Merchant::find($row['id']);
        if(empty($data)){
            return new Merchant([
                'id'              => $row['id'],
                'merchant_name'   => $row['merchant'],
                'vendor'          => $row['vendor'],
                'nmid'            => $row['nmid'],
                'no_rekening'     => $row['no_rekening'],
                'tgl_terdaftar'   => $row['tgl_terdaftar'],
                'qris'            => $row['qris'],
                'area_id'         => $area_id
            ]);
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
        return 'id';
    }
}
