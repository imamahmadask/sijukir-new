<?php

namespace App\Livewire\Peringatan\Histori;

use App\Models\HistoriPeringatan;
use App\Models\Peringatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditHistoriPeringatan extends Component
{
    public $keterangan;
    public $histori_peringatan_id;

    #[Validate('required')]
    public $tanggal, $jml_setor, $deskripsi, $surat_peringatan_id;

    public function render()
    {
        return view('livewire.peringatan.histori.edit-histori-peringatan');
    }

    #[On('edit-histori-peringatan')]
    public function getHistoriPeringatan($id)
    {
        $histori = HistoriPeringatan::find($id);
        $this->histori_peringatan_id = $histori->id;
        $this->tanggal = $histori->tanggal;
        $this->jml_setor = $histori->jml_setor;
        $this->deskripsi = $histori->deskripsi;
        $this->keterangan = $histori->keterangan;
        $this->surat_peringatan_id = $histori->surat_peringatan_id;
    }

    public function editHistoriPeringatan()
    {
        $this->validate();

        $histori = HistoriPeringatan::find($this->histori_peringatan_id);

        $histori->update([
            'tanggal' => $this->tanggal,
            'jml_setor' => $this->jml_setor,
            'deskripsi' => $this->deskripsi,
            'keterangan' => $this->keterangan,
            'edited_by' => Auth::user()->name,
            'surat_peringatan_id' => $this->surat_peringatan_id
        ]);

        $this->updateTotalSetor();

        session()->flash('success', 'Data Histori Peringatan berhasil diubah!');

        $this->redirectRoute('peringatan.show', ['peringatan' => $this->surat_peringatan_id]);
    }

    public function updateTotalSetor(){
        $peringatan = Peringatan::find($this->surat_peringatan_id);

        $total_bayar = 0;
        $is_lunas = $peringatan->is_lunas;

        foreach($peringatan->histori_peringatan as $histori){
            $total_bayar += $histori->jml_setor;
        }
        if($total_bayar >= $peringatan->jml_kurang_setor){
            $is_lunas = 1;
        }elseif($total_bayar < $peringatan->jml_kurang_setor){
            $is_lunas = 0;
        }

        $peringatan->update([
            'total_bayar' => $total_bayar,
            'is_lunas' => $is_lunas
        ]);
    }
}
