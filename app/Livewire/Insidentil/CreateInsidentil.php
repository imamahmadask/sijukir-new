<?php

namespace App\Livewire\Insidentil;

use App\Models\Insidentil;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Insidentil')]
class CreateInsidentil extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $tgl_pendaftaran, $nik, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jk, $agama, $pekerjaan, $telepon;

    #[Validate('required')]
    public $nama_perusahaan, $alamat_perusahaan, $akta_perusahaan, $npwp_perusahaan;

    #[Validate('required')]
    public $nama_acara, $lokasi_acara, $jumlah_hari, $tgl_awal_acara, $tgl_akhir_acara,
            $waktu_acara, $lokasi_parkir, $kriteria_lokasi,  $jenis_izin, $luas_lokasi, $r2, $r4,
            $potensi, $setoran;

    public $keterangan, $dokumen, $merchant_id, $status;

    public function render()
    {
        return view('livewire.insidentil.create-insidentil');
    }

    public function addInsidentil()
    {
        $this->validate();

        if($this->jenis_izin == 'Pajak')
        {
            $this->status = 'Success';
        }
        elseif($this->jenis_izin == 'Retribusi')
        {
            $this->status = 'Pending';
        }

        Insidentil::create([
            'tgl_pendaftaran' => $this->tgl_pendaftaran,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jk' => $this->jk,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'telepon' => $this->telepon,
            'jenis_izin' => $this->jenis_izin,
            'nama_perusahaan' => $this->nama_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'akta_perusahaan' => $this->akta_perusahaan,
            'npwp_perusahaan' => $this->npwp_perusahaan,
            'nama_acara' => $this->nama_acara,
            'lokasi_acara' => $this->lokasi_acara,
            'jumlah_hari' => $this->jumlah_hari,
            'tgl_awal_acara' => $this->tgl_awal_acara,
            'tgl_akhir_acara' => $this->tgl_akhir_acara,
            'waktu_acara' => $this->waktu_acara,
            'lokasi_parkir' => $this->lokasi_parkir,
            'kriteria_lokasi' => $this->kriteria_lokasi,
            'luas_lokasi' => $this->luas_lokasi,
            'r2' => $this->r2,
            'r4' => $this->r4,
            'potensi' => $this->potensi,
            'setoran' => $this->setoran,
            'dokumen' => $this->dokumen,
            'keterangan' => $this->keterangan,
            'status' => $this->status,
            'merchant_id' => random_int(1, 100),
        ]);

        $this->reset();

        session()->flash('success', 'Data Insidentil berhasil ditambah!');

        $this->redirectRoute('insidentil.index');
    }

    public function updatedKriteriaLokasi($value)
    {
        if($value == 'TJU' || $value == 'TKP')
        {
            $this->jenis_izin = 'Retribusi';
        }
        elseif($value == 'TPK')
        {
            $this->jenis_izin = 'Pajak';
        }
    }
}
