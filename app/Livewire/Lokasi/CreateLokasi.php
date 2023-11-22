<?php

namespace App\Livewire\Lokasi;

use App\Models\Area;
use App\Models\Kelurahan;
use App\Models\Korlap;
use App\Models\Lokasi;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Tambah Lokasi')]
class CreateLokasi extends Component
{
    use WithFileUploads;

    public $kel, $korlaps = [];
    public $areas, $keterangan, $slug, $kord_long, $kord_lat, $no_ketetapan, $tgl_ketetapan;

    #[Validate('required|min:6|unique:lokasis,titik_parkir')]
    public $titik_parkir;

    #[Validate('required')]
    public $pendaftaran, $lokasi_parkir, $kecamatan, $kelurahan, $jenis_lokasi, $kategori,
    $sisi, $panjang_luas, $korlap, $waktu_pelayanan, $hari_buka, $dasar_ketetapan, $google_maps, $kordinat;

    #[Validate('required|date|before_or_equal:today')]
    public $tgl_registrasi;

    #[Validate('required|image|mimes:jpeg,png,jpg,webp|max:2000')]
    public $gambar;

    public function render()
    {
        return view('livewire.lokasi.create-lokasi');
    }

    public function addLokasi(){
        $this->validate();

        $this->getDasarKetetapan($this->dasar_ketetapan);

        $this->getKordinat($this->kordinat);

        // Gambar Lokasi
        $nama_gambar = $this->titik_parkir.'.'.$this->gambar->extension();
        $file_gambar = $this->gambar->storeAs('foto_lokasi', $nama_gambar, 'public');

        Lokasi::create([
            'titik_parkir' => $this->titik_parkir,
            'lokasi_parkir' => $this->lokasi_parkir,
            'slug' => Str::slug($this->titik_parkir, '-'),
            'jenis_lokasi' => $this->jenis_lokasi,
            'waktu_pelayanan' => $this->waktu_pelayanan,
            'dasar_ketetapan' => $this->dasar_ketetapan,
            'no_ketetapan' => $this->no_ketetapan,
            'tgl_ketetapan' => $this->tgl_ketetapan,
            'kord_long' => $this->kord_long,
            'kord_lat' => $this->kord_lat,
            'tgl_registrasi' => $this->tgl_registrasi,
            'sisi' => $this->sisi,
            'panjang_luas' => $this->panjang_luas,
            'google_maps' => $this->google_maps,
            'pendaftaran' => $this->pendaftaran,
            'gambar' => $file_gambar,
            'status' => "Tunai",
            'is_jukir' => 0,
            'hari_buka' => $this->hari_buka,
            'area_id' => $this->kecamatan,
            'kelurahan_id' => $this->kelurahan,
            'korlap_id' => $this->korlap,
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan
        ]);

        // $this->resetForm();
        $this->reset();

        session()->flash('success', 'Data Lokasi berhasil diinput!');

        $this->redirect('/admin/lokasi');
    }

    public function mount(){
        $this->areas = Area::all();
        $this->korlaps = Korlap::select('id', 'nama')->orderBy('nama', 'asc')->get();
    }

    public function updatedKecamatan($value){
        if($value){
            $this->kel = Kelurahan::select('id', 'kelurahan')->where('area_id', $value)->get();
        }
    }

    public function getDasarKetetapan($value){
        if (!is_null($value)) {
            if($value == "SK WALIKOTA"){
                $this->no_ketetapan = "No. 697/VIII/2021";
                $this->tgl_ketetapan = "2021-08-31";
            }elseif($value == "PERWAL"){
                $this->no_ketetapan = "No. 09 Tahun 2016";
                $this->tgl_ketetapan = "2016-04-01";
            }elseif($value == "SK KADIS"){
                $this->no_ketetapan = "449/SK/DISHUB/XII/2022";
                $this->tgl_ketetapan = "2022-12-30";
            }
        }
    }

    public function getKordinat($value){
        $pecah = explode(", ", $value);
        $this->kord_lat = $pecah[0];
        $this->kord_long = $pecah[1];
    }

    public function resetForm(){
        $this->titik_parkir="";
        $this->lokasi_parkir="";
        $this->jenis_lokasi="";
        $this->waktu_pelayanan="";
        $this->dasar_ketetapan="";
        $this->no_ketetapan="";
        $this->google_maps="";
        $this->sisi="";
        $this->panjang_luas="";
        $this->tgl_ketetapan="";
        $this->tgl_registrasi="";
        $this->hari_buka= "";
        $this->kecamatan="";
        $this->kelurahan="";
        $this->gambar="";
        $this->kategori="";
        $this->keterangan="";
        $this->kecamatan = null;
        $this->kelurahan = null;
        $this->korlap = null;
        $this->kordinat = "";
    }

}
