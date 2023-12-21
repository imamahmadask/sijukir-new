<?php

namespace App\Livewire\Jukir\Histori;

use App\Livewire\Jukir\ShowJukir;
use App\Models\HistoriJukir;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateHistori extends Component
{
    #[Validate('required')]
    public $tgl_histori, $no_surat, $jenis_histori, $jukir_id, $histori;

    public function render()
    {
        // dd($this->jukir_id);
        return view('livewire.jukir.histori.create-histori');
    }

    public function addHistoriJukir(){
        $this->validate();

        HistoriJukir::create([
            'tgl_histori' => $this->tgl_histori,
            'no_surat' => $this->no_surat,
            'jenis_histori' => $this->jenis_histori,
            'histori' => $this->histori,
            'jukir_id' => $this->jukir_id,
            'created_by' => Auth::user()->name,
            'edited_by' => Auth::user()->name
        ]);

        // $this->reset();

        // session()->flash('status', 'Histori berhasil ditambahkan.');

        // $this->dispatch('histori-created');

        session()->flash('success', 'Histori berhasil ditambahkan!');

        $this->redirectRoute('jukir.show', ['jukir' => $this->jukir_id]);
    }
}
