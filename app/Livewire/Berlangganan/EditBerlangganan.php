<?php

namespace App\Livewire\Berlangganan;

use App\Models\Berlangganan;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Berlangganan')]
class EditBerlangganan extends Component
{
    #[Validate('required')]
    public $tgl_dikeluarkan, $awal_berlaku, $akhir_berlaku;

    #[Validate('required')]
    public $nomor, $jenis, $jumlah, $nama, $no_pol, $alamat, $status, $masa_berlaku;

    public $keterangan, $berlanggananId;

    public function render()
    {
        return view('livewire.berlangganan.edit-berlangganan');
    }

    public function mount($id)
    {
        $berlangganan = Berlangganan::find($id);

        $this->berlanggananId = $berlangganan->id;
        $this->tgl_dikeluarkan = $berlangganan->tgl_dikeluarkan;
        $this->nama = $berlangganan->nama;
        $this->nomor = $berlangganan->nomor;
        $this->jenis = $berlangganan->jenis;
        $this->jumlah = $berlangganan->jumlah;
        $this->no_pol = $berlangganan->no_pol;
        $this->alamat = $berlangganan->alamat;
        $this->status = $berlangganan->status;
        $this->masa_berlaku = $berlangganan->masa_berlaku;
        $this->awal_berlaku = $berlangganan->awal_berlaku;
        $this->akhir_berlaku = $berlangganan->akhir_berlaku;
    }

    public function updateBerlangganan()
    {
        $this->validate();

        $berlangganan = Berlangganan::find($this->berlanggananId);

        $berlangganan->update([
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

        session()->flash('success', 'Data Berlangganan berhasil diubah!');

        $this->redirect('/admin/berlangganan');
    }

    public function updatedJenis($value)
    {
        if($value == 'Lainnya'){
            $this->jumlah = 0;
        }elseif($value == 'Mobil'){
            $this->jumlah = 50000;
        }elseif($value == 'Truck'){
            $this->jumlah = 75000;
        }
    }

    public function updatedStatus($value)
    {
        if($value){
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
