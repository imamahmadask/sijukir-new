<?php

namespace App\Livewire\Jukir\Histori;

use App\Models\HistoriJukir;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditHistori extends Component
{
    public $histori_id;

    #[Validate('required')]
    public $tgl_histori, $no_surat, $jenis_histori, $jukir_id, $histori;

    public function render()
    {
        return view('livewire.jukir.histori.edit-histori');
    }

    #[On('edit-histori')]
    public function getHistoriJukir($id)
    {
        $histori = HistoriJukir::find($id);
        $this->histori_id = $histori->id;
        $this->tgl_histori = $histori->tgl_histori;
        $this->no_surat = $histori->no_surat;
        $this->jenis_histori = $histori->jenis_histori;
        $this->jukir_id = $histori->jukir_id;
        $this->histori = $histori->histori;
    }

    public function editHistoriJukir()
    {
        $this->validate();

        $histori = HistoriJukir::find($this->histori_id);

        $histori->update([
            'tgl_histori' => $this->tgl_histori,
            'no_surat' => $this->no_surat,
            'jenis_histori' => $this->jenis_histori,
            'histori' => $this->histori,
            'jukir_id' => $this->jukir_id,
            'edited_by' => Auth::user()->name
        ]);

        session()->flash('success', 'Data histori berhasil diupdate!');

        $this->redirectRoute('jukir.show', ['jukir' => $this->jukir_id]);

    }
}
