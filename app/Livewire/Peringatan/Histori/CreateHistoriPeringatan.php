<?php

namespace App\Livewire\Peringatan\Histori;

use App\Models\HistoriPeringatan;
use App\Models\Peringatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateHistoriPeringatan extends Component
{
    public $keterangan;

    #[Validate('required')]
    public $tanggal, $jml_setor, $deskripsi, $peringatan_id;

    public function render()
    {
        return view('livewire.peringatan.histori.create-histori-peringatan');
    }

    public function addHistoriPeringatan()
    {
        $this->validate();

        HistoriPeringatan::create([
            'tanggal' => $this->tanggal,
            'jml_setor' => $this->jml_setor,
            'deskripsi' => $this->deskripsi,
            'keterangan' => $this->keterangan,
            'created_by' => Auth::user()->name,
            'surat_peringatan_id' => $this->peringatan_id
        ]);

        $this->updateTotalSetor();

        session()->flash('success', 'Data Histori Peringatan berhasil ditambah!');

        $this->redirectRoute('peringatan.show', ['peringatan' => $this->peringatan_id]);
    }

    public function updateTotalSetor(){
        $peringatan = Peringatan::find($this->peringatan_id);

        $total_bayar = 0;
        $is_lunas = $peringatan->is_lunas;

        foreach($peringatan->histori_peringatan as $histori){
            $total_bayar += $histori->jml_setor;
        }

        if($total_bayar >= $peringatan->jml_kurang_setor){
            $is_lunas = 1;
        }

        $peringatan->update([
            'total_bayar' => $total_bayar,
            'is_lunas' => $is_lunas
        ]);
    }
}
