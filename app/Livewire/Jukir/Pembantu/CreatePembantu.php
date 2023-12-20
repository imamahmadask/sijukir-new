<?php

namespace App\Livewire\Jukir\Pembantu;

use App\Models\Jukir;
use App\Models\JukirPembantu;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePembantu extends Component
{
    use WithFileUploads;

    public $jukir_id;

    #[Validate('required')]
    public $nama, $nik, $alamat, $kel_alamat, $kec_alamat, $kab_kota_alamat, $telepon, $tempat_lahir, $tgl_lahir, $agama, $jenis_kelamin;

    #[Validate('required|image|mimes:jpeg,png,jpg,webp|max:2000')]
    public $foto;

    public function render()
    {
        return view('livewire.jukir.pembantu.create-pembantu');
    }

    public function addJukirPembantu()
    {
        $this->validate();

        $kode_jukir = Jukir::find($this->jukir_id)->value('kode_jukir');

        $nama_foto = $this->nama.'_'.$kode_jukir.'.'.$this->foto->extension();
        $file_foto = $this->foto->storeAs("foto_jukpem", $nama_foto, 'public');

        JukirPembantu::create([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'kel_alamat' => $this->kel_alamat,
            'kec_alamat' => $this->kec_alamat,
            'kab_kota_alamat' => $this->kab_kota_alamat,
            'telepon' => $this->telepon,
            'agama' => $this->agama,
            'foto' => $file_foto,
            'jukir_id' => $this->jukir_id,
            'status' => 1
        ]);

        session()->flash('success', 'Jukir Pembantu berhasil ditambahkan!');

        $this->redirectRoute('jukir.show', ['jukir' => $this->jukir_id]);
    }
}
