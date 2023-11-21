<?php

namespace App\Livewire\Korlap;

use App\Models\Korlap;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;


#[Title('Edit Korlap')]
class EditKorlap extends Component
{
    use WithFileUploads;

    public $korlapId, $foto_asli;
    public $foto;

    #[Rule('required')]
    public $nama, $nik, $telepon, $alamat;


    public function render()
    {
        return view('livewire.korlap.edit-korlap');
    }

    public function mount($id)
    {
        //get korlap
        $korlap = Korlap::find($id);

        //assign
        $this->korlapId = $korlap->id;
        $this->nama = $korlap->nama;
        $this->nik = $korlap->nik;
        $this->telepon = $korlap->telepon;
        $this->alamat = $korlap->alamat;
        $this->foto_asli = $korlap->foto;
    }

    public function updateKorlap(){
        $this->validate();

        $korlap = Korlap::find($this->korlapId);

        // setting Foto Korlap
        if($this->foto == $korlap->foto || $this->foto == null){
            $file_foto = $korlap->foto;
        }else{
            $nama_foto = $this->nama.'.'.$this->foto->extension();
            $file_foto = $this->foto->storeAs('foto_korlap', $nama_foto, 'public');
        }

        $korlap->update([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'foto' => $file_foto,
        ]);

        $this->reset();

        session()->flash('success', 'Data Korlap berhasil diupdate!');

        $this->redirect('/admin/korlap');
    }
}
