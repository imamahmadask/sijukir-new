<?php

namespace App\Livewire\Pengaduan;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class EditPengaduan extends Component
{
    public $pengaduanId, $nama, $telepon, $pesan, $titik, $lokasi, $jenis, $foto, $status, $saran, $tgl_diproses, $tgl_selesai_proses;

    public function render()
    {
        return view('livewire.pengaduan.edit-pengaduan');
    }

    #[On('edit-pengaduan')]
    public function getPengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);

        $this->pengaduanId = $pengaduan->id;
        $this->nama = $pengaduan->nama;
        $this->telepon = $pengaduan->telepon;
        $this->pesan = $pengaduan->pesan;
        $this->titik = $pengaduan->titik;
        $this->lokasi = $pengaduan->lokasi;
        $this->jenis = $pengaduan->jenis;
        $this->foto = $pengaduan->foto;
        $this->status = $pengaduan->status;
        $this->saran = $pengaduan->saran;
        $this->tgl_diproses = $pengaduan->tgl_diproses;
        $this->tgl_selesai_proses = $pengaduan->tgl_selesai_proses;
    }

    public function editPengaduan()
    {
        $pengaduan = Pengaduan::find($this->pengaduanId);

        $pengaduan->update([
            'status' => $this->status,
            'saran' => $this->saran,
            'tgl_diproses' => $this->tgl_diproses,
            'tgl_selesai_proses' => $this->tgl_selesai_proses,
            'edited_by' => Auth::user()->name
        ]);

        session()->flash('success', 'Data pengaduan berhasil diupdate!');

        $this->redirectRoute('pengaduan.index');
    }
}
