<?php

namespace App\Livewire\Berlangganan;

use App\Models\Berlangganan;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Tambah Berlangganan')]
class CreateBerlangganan extends Component
{
    #[Validate('required')]
    public $tgl_dikeluarkan, $awal_berlaku, $akhir_berlaku;

    #[Validate('required')]
    public $nomor, $jenis, $jumlah, $nama, $no_pol, $alamat, $status, $masa_berlaku;

    public $keterangan;

    public function render()
    {
        return view('livewire.berlangganan.create-berlangganan');
    }

    public function addBerlangganan()
    {
        $this->validate();

        Berlangganan::create([
            'tgl_dikeluarkan' => $this->tgl_dikeluarkan,
            'nomor' => $this->nomor,
            'jenis' => $this->jenis,
            'jumlah' => $this->jumlah,
            'nama' => $this->nama,
            'no_pol' => $this->no_pol,
            'alamat' => $this->alamat,
            'status' => $this->status,
            'masa_berlaku' => $this->masa_berlaku,
            'awal_berlaku' => $this->awal_berlaku,
            'akhir_berlaku' => $this->akhir_berlaku,
            'keterangan' => $this->keterangan
        ]);

        $this->reset();

        session()->flash('success', 'Data Berlangganan berhasil ditambah!');

        $this->redirect('/admin/berlangganan');
    }

    public function updatedJenis($value){
        if($value == 'Lainnya'){
            $this->jumlah = 0;
        }elseif($value == 'Mobil'){
            $this->jumlah = 50000;
        }elseif($value == 'Truck'){
            $this->jumlah = 75000;
        }
    }

    public function updatedStatus($value){
        if($value == 'Lainnya'){
            $this->masa_berlaku = 0;
            $this->awal_berlaku = $this->tgl_dikeluarkan;
            $this->akhir_berlaku = $this->tgl_dikeluarkan;
        }else{
            $this->masa_berlaku = 6;
            $this->awal_berlaku = $this->tgl_dikeluarkan;
            $this->akhir_berlaku = Carbon::parse($this->awal_berlaku)->addMonth($this->masa_berlaku)->toDateString();
        }
    }

    public function updatedTglDikeluarkan($value)
    {
        $this->awal_berlaku = $value;

        if($this->status == 'Lainnya'){
            $this->akhir_berlaku = $this->awal_berlaku;
        }else{
            $this->akhir_berlaku = Carbon::parse($this->awal_berlaku)->addMonth($this->masa_berlaku)->toDateString();
        }
    }

}
