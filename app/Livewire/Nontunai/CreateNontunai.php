<?php

namespace App\Livewire\Nontunai;

use App\Imports\ImportNontunai;
use App\Models\NonTunai;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateNontunai extends Component
{
    use WithFileUploads;

    #[Validate('required|file|mimes:xls, xlsx|max:20000')]
    public $file_nontunai;

    public function render()
    {
        $latestFile = NonTunai::select('filename', 'created_at')->orderBy('created_at', 'desc')->first();

        return view('livewire.nontunai.create-nontunai', [
            'latestFile' => $latestFile
        ]);
    }

    public function addNontunai()
    {
        $this->validate();

        $filename = $this->file_nontunai->getClientOriginalName();

        Excel::import(new ImportNontunai($filename), $this->file_nontunai);

        session()->flash('success', 'Data Transaksi Non-Tunai Berhasil diimport!');

        return redirect()->route('nontunai.index');
    }
}
