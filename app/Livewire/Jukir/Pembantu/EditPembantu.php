<?php

namespace App\Livewire\Jukir\Pembantu;

use App\Models\Jukir;
use App\Models\JukirPembantu;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPembantu extends Component
{
    use WithFileUploads;

    public $pembantu_id, $jukir_id;
    public $foto, $foto_asli;

    #[Validate('required')]
    public $nama, $nik, $alamat, $kel_alamat, $kec_alamat, $kab_kota_alamat, $telepon, $tempat_lahir, $tgl_lahir, $agama, $jenis_kelamin, $status;


    public function render()
    {
        return view('livewire.jukir.pembantu.edit-pembantu');
    }

    #[On('edit-pembantu')]
    public function getPembantu($id)
    {
        $histori = JukirPembantu::find($id);
        $this->pembantu_id = $histori->id;
        $this->nama = $histori->nama;
        $this->nik = $histori->nik;
        $this->alamat = $histori->alamat;
        $this->kel_alamat = $histori->kel_alamat;
        $this->kec_alamat = $histori->kec_alamat;
        $this->kab_kota_alamat = $histori->kab_kota_alamat;
        $this->telepon = $histori->telepon;
        $this->tempat_lahir = $histori->tempat_lahir;
        $this->tgl_lahir = $histori->tgl_lahir;
        $this->agama = $histori->agama;
        $this->jenis_kelamin = $histori->jenis_kelamin;
        $this->foto_asli = $histori->foto;
        $this->jukir_id = $histori->jukir_id;
        $this->status = $histori->status;
    }

    public function editJukirPembantu()
    {
        $this->validate();

        $kode_jukir = Jukir::find($this->jukir_id)->value('kode_jukir');

        $jukir_pembantu = JukirPembantu::find($this->pembantu_id);

        if($this->foto == $jukir_pembantu->foto || $this->foto == null)
        {
            $file_foto = $jukir_pembantu->foto;
        }
        else
        {
            $nama_foto = $this->nama.'_'.$kode_jukir.'.'.$this->foto->extension();
            $file_foto = $this->foto->storeAs('foto_jukpem', $nama_foto, 'public');
        }

        $jukir_pembantu->update([
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
            'status' => $this->status
        ]);

        session()->flash('success', 'Jukir Pembantu berhasil ditambahkan!');

        $this->redirectRoute('jukir.show', ['jukir' => $this->jukir_id]);
    }
}
