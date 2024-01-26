<?php

namespace App\Livewire\Insidentil;

use App\Models\Insidentil;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Insidentil')]
class EditInsidentil extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $tgl_pendaftaran, $nik, $nama, $alamat, $tempat_lahir, $tgl_lahir, $jk, $agama, $pekerjaan, $telepon;

    #[Validate('required')]
    public $nama_perusahaan, $alamat_perusahaan, $akta_perusahaan, $npwp_perusahaan;

    #[Validate('required')]
    public $nama_acara, $lokasi_acara, $jumlah_hari, $tgl_awal_acara, $tgl_akhir_acara,
            $waktu_acara, $lokasi_parkir, $kriteria_lokasi,  $jenis_izin, $luas_lokasi, $r2, $r4,
            $potensi, $setoran;

    public $insidentilId, $keterangan, $dokumen, $dokumen_asli, $merchant_id, $status, $no_surat, $tgl_surat;

    public function render()
    {
        return view('livewire.insidentil.edit-insidentil');
    }

    public function mount($id)
    {
        $insidentil = Insidentil::find($id);

            $this->insidentilId = $insidentil->id;
            $this->tgl_pendaftaran = $insidentil->tgl_pendaftaran;
            $this->nik = $insidentil->nik;
            $this->nama = $insidentil->nama;
            $this->alamat = $insidentil->alamat;
            $this->tempat_lahir = $insidentil->tempat_lahir;
            $this->tgl_lahir = $insidentil->tgl_lahir;
            $this->jk = $insidentil->jk;
            $this->agama = $insidentil->agama;
            $this->pekerjaan = $insidentil->pekerjaan;
            $this->telepon = $insidentil->telepon;
            $this->jenis_izin = $insidentil->jenis_izin;
            $this->nama_perusahaan = $insidentil->nama_perusahaan;
            $this->alamat_perusahaan = $insidentil->alamat_perusahaan;
            $this->akta_perusahaan = $insidentil->akta_perusahaan;
            $this->npwp_perusahaan = $insidentil->npwp_perusahaan;
            $this->nama_acara = $insidentil->nama_acara;
            $this->lokasi_acara = $insidentil->lokasi_acara;
            $this->jumlah_hari = $insidentil->jumlah_hari;
            $this->tgl_awal_acara = $insidentil->tgl_awal_acara;
            $this->tgl_akhir_acara = $insidentil->tgl_akhir_acara;
            $this->waktu_acara = $insidentil->waktu_acara;
            $this->lokasi_parkir = $insidentil->lokasi_parkir;
            $this->kriteria_lokasi = $insidentil->kriteria_lokasi;
            $this->luas_lokasi = $insidentil->luas_lokasi;
            $this->r2 = $insidentil->r2;
            $this->r4 = $insidentil->r4;
            $this->potensi = $insidentil->potensi;
            $this->setoran = $insidentil->setoran;
            $this->dokumen_asli = $insidentil->dokumen;
            $this->keterangan = $insidentil->keterangan;
            $this->status = $insidentil->status;
            $this->merchant_id = $insidentil->merchant_id;
            $this->no_surat = $insidentil->no_surat;
            $this->tgl_surat = $insidentil->tgl_surat;
    }

    public function editInsidentil()
    {
        $this->validate();
        $file_dokumen = null;

        if($this->jenis_izin == 'Pajak')
        {
            $this->status = 'Succeed';
        }
        elseif($this->jenis_izin == 'Retribusi')
        {
            $this->status = 'Pending';
        }

        $insidentil = Insidentil::find($this->insidentilId);

        if($this->dokumen == $insidentil->dokumen || $this->dokumen == null){
            $file_dokumen = $insidentil->dokumen;
        }else{
            $nama_dokumen = $this->nama_acara.'.'.$this->dokumen->extension();
            $file_dokumen = $this->dokumen->storeAs('file_insidentil', $nama_dokumen, 'public');
        }

        $insidentil->update([
            'tgl_pendaftaran' => $this->tgl_pendaftaran,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jk' => $this->jk,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'telepon' => $this->telepon,
            'jenis_izin' => $this->jenis_izin,
            'nama_perusahaan' => $this->nama_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'akta_perusahaan' => $this->akta_perusahaan,
            'npwp_perusahaan' => $this->npwp_perusahaan,
            'nama_acara' => $this->nama_acara,
            'lokasi_acara' => $this->lokasi_acara,
            'jumlah_hari' => $this->jumlah_hari,
            'tgl_awal_acara' => $this->tgl_awal_acara,
            'tgl_akhir_acara' => $this->tgl_akhir_acara,
            'waktu_acara' => $this->waktu_acara,
            'lokasi_parkir' => $this->lokasi_parkir,
            'kriteria_lokasi' => $this->kriteria_lokasi,
            'luas_lokasi' => $this->luas_lokasi,
            'r2' => $this->r2,
            'r4' => $this->r4,
            'potensi' => $this->potensi,
            'setoran' => $this->setoran,
            'dokumen' => $file_dokumen,
            'keterangan' => $this->keterangan,
            'status' => $this->status,
            'no_surat' => $this->no_surat,
            'tgl_surat' => $this->tgl_surat,
        ]);

        $this->reset();

        session()->flash('success', 'Data Insidentil berhasil diubah!');

        $this->redirectRoute('insidentil.show', ['insidentil' => $insidentil->id]);
    }

    public function updatedKriteriaLokasi($value)
    {
        if($value == 'TJU' || $value == 'TKP')
        {
            $this->jenis_izin = 'Retribusi';
        }
        elseif($value == 'TPK')
        {
            $this->jenis_izin = 'Pajak';
        }
    }
}
