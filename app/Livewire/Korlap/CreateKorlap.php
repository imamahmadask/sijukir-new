<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

#[Title('Korlap')]
class CreateKorlap extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $nama, $nik, $telepon, $alamat;

    #[Rule('required|image|mimes:jpeg,png,jpg,webp|max:2000')]
    public $foto;

    public function render()
    {
        return view('livewire.korlap.create-korlap');
    }

    public function addKorlap(){
        $this->validate();

        // Foto Korlap
        $nama_foto = $this->nama.'.'.$this->foto->extension();
        $file_foto = $this->foto->storeAs('foto_korlap', $nama_foto, 'public');

        Korlap::create([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'foto' => $file_foto,
        ]);

        $this->reset();

        session()->flash('success', 'Data Korlap berhasil diinput!');

        $this->redirect('/admin/korlap');
    }
}
