<?php

namespace App\Livewire\Tunai;

use App\Models\Jukir;
use App\Models\Tunai;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Tunai')]
class EditTunai extends Component
{
    public $jukirs =[];
    public $tunaiId, $area_id, $keterangan;

    #[Rule('required')]
    public $type, $tgl_transaksi, $no_kwitansi, $jumlah_transaksi, $jukir;

    public function render()
    {
        return view('livewire.tunai.edit-tunai');
    }

    public function mount($id){
        $this->jukirs = Jukir::select('id', 'nama_jukir')
                            ->orderBy('nama_jukir', 'asc')
                            ->get();

        $tunais = Tunai::find($id);

        $this->tunaiId = $tunais->id;
        $this->type = $tunais->type;
        $this->tgl_transaksi = $tunais->tgl_transaksi;
        $this->no_kwitansi = $tunais->no_kwitansi;
        $this->jumlah_transaksi = $tunais->jumlah_transaksi;
        $this->jukir = $tunais->jukir_id;
        $this->area_id = $tunais->area_id;
        $this->keterangan = $tunais->keterangan;
    }

    public function updateTunai(){
        $this->validate();

        $tunai = Tunai::find($this->tunaiId);

        $tunai->update([
            'type' => $this->type,
            'tgl_transaksi' => $this->tgl_transaksi,
            'no_kwitansi' => $this->no_kwitansi,
            'jumlah_transaksi' => $this->jumlah_transaksi,
        ]);

        $this->reset();

        session()->flash('success', 'Data Tunai berhasil diubah!');

        $this->redirect('/admin/tunai');
    }
}
