<?php

namespace App\Livewire\Tunai;

use App\Models\Jukir;
use App\Models\Tunai;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Tambah Tunai')]
class CreateTunai extends Component
{
    public $jukirs =[];
    public $area_id, $keterangan;
    public $tgl_perjanjian, $tgl_terbit_qr, $jml_hari, $potensi_harian;

    #[Validate('required')]
    public $type, $tgl_transaksi, $no_kwitansi, $jumlah_transaksi, $jukir;

    public function render()
    {
        return view('livewire.tunai.create-tunai');
    }

    public function addTunai(){
        $this->validate();

        $jukir= Jukir::find($this->jukir);
        $this->area_id = $jukir->lokasi->area_id;

        Tunai::create([
            'type' => $this->type,
            'tgl_transaksi' => $this->tgl_transaksi,
            'no_kwitansi' => $this->no_kwitansi,
            'jumlah_transaksi' => $this->jumlah_transaksi,
            'jukir_id' => $this->jukir,
            'area_id' => $this->area_id
        ]);

        $this->reset();

        session()->flash('success', 'Data Tunai berhasil ditambah!');

        $this->redirect('/admin/tunai');
    }

    public function updatedType($value){
        if($value == 'Migrasi'){
            $this->jukirs = Jukir::select('id', 'nama_jukir')
                            ->where('status', 'Non-Tunai')->get();
        }elseif($value == 'Non-Migrasi'){
            $this->jukirs = [];
        }
    }

    public function updatedJukir($value){
        $jukir = Jukir::find($value);

        $this->tgl_perjanjian = $jukir->tgl_perjanjian;
        $this->tgl_terbit_qr = $jukir->tgl_terbit_qr;
        $this->jml_hari = $jukir->jml_hari_kerja;
        $this->potensi_harian = $jukir->potensi_harian;
    }
}
