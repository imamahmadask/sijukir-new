<?php

namespace App\Livewire\Insidentil;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Insidentil')]
class CreateInsidentil extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $tgl_pendaftaran, $nik, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jk, $agama, $pekerjaan, $telepon, $jenis_izin;
    public $nama_perusahaan, $alamat_perusahaan, $akta_perusahaan, $npwp_perusahaan;
    public $nama_acara, $lokasi_acara, $jumlah_hari, $tgl_awal_acara, $tgl_akhir_acara,
            $waktu_acara, $lokasi_parkir, $kriteria_lokasi, $luas_lokasi, $r2, $r4,
            $potensi, $setoran, $dokumen, $keterangan, $status, $merchant_id, $tgl_surat, $no_surat;

    public function render()
    {
        return view('livewire.insidentil.create-insidentil');
    }

    public function addInsidentil()
    {

    }
}
