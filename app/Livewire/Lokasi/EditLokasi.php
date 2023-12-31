<?php

namespace App\Livewire\Lokasi;

use App\Models\Area;
use App\Models\Kelurahan;
use App\Models\Korlap;
use App\Models\Lokasi;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

#[Title('Edit Lokasi')]
class EditLokasi extends Component
{
    use WithFileUploads;

    public $kel, $korlaps = [];
    public $areas, $lokasiId, $keterangan, $is_jukir, $is_active, $gambar_asli, $area_id_lama, $slug, $kord_long, $kord_lat, $no_ketetapan, $tgl_ketetapan;

    #[Validate('required|min:6')]
    public $titik_parkir;

    #[Validate('required')]
    public $pendaftaran, $lokasi_parkir, $kecamatan, $kelurahan, $jenis_lokasi, $kategori,
    $sisi, $panjang_luas, $korlap, $waktu_pelayanan, $hari_buka, $dasar_ketetapan, $google_maps, $kordinat;

    #[Validate('required|date|before_or_equal:today')]
    public $tgl_registrasi;

    // #[Validate('required|image|mimes:jpeg,png,jpg,webp|max:2000')]
    public $gambar;

    public function render()
    {
        return view('livewire.lokasi.edit-lokasi');
    }

    public function mount($id)
    {
        $this->areas = Area::all();
        $this->kel = Kelurahan::all();
        $this->korlaps = Korlap::select('id', 'nama')->orderBy('nama', 'asc')->get();

        //get post
        $lokasi = Lokasi::find($id);

        //assign
        $this->lokasiId = $lokasi->id;
        $this->titik_parkir = $lokasi->titik_parkir;
        $this->lokasi_parkir = $lokasi->lokasi_parkir;
        $this->jenis_lokasi = $lokasi->jenis_lokasi;
        $this->waktu_pelayanan = $lokasi->waktu_pelayanan;
        $this->dasar_ketetapan = $lokasi->dasar_ketetapan;
        $this->gambar_asli = $lokasi->gambar;
        $this->keterangan = $lokasi->keterangan;
        $this->pendaftaran = $lokasi->pendaftaran;
        $this->tgl_registrasi = $lokasi->tgl_registrasi;
        $this->sisi = $lokasi->sisi;
        $this->panjang_luas = $lokasi->panjang_luas;
        $this->google_maps = $lokasi->google_maps;
        $this->hari_buka = $lokasi->hari_buka;
        $this->kategori = $lokasi->kategori;
        $this->kecamatan = $lokasi->area_id;
        $this->kelurahan = $lokasi->kelurahan_id;
        $this->kordinat = $lokasi->kord_lat.", ".$lokasi->kord_long;
        $this->is_active = $lokasi->is_active;
        $this->korlap = $lokasi->korlap_id;
    }

    public function updateLokasi(){
        $this->validate();

        $lokasi = Lokasi::find($this->lokasiId);

        $this->area_id_lama = $lokasi->area_id;

        $this->getDasarKetetapan($this->dasar_ketetapan);

        $this->getKordinat($this->kordinat);

        // setting Gambar Lokasi
        if($this->gambar == $lokasi->gambar || $this->gambar == null){
            $file_gambar = $lokasi->gambar;
        }else{
            $nama_gambar = $this->titik_parkir.'.'.$this->gambar->extension();
            $file_gambar = $this->gambar->storeAs('foto_lokasi', $nama_gambar, 'public');
        }

        $lokasi->update([
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
            'hari_buka' => $this->hari_buka,
            'area_id' => $this->kecamatan,
            'kelurahan_id' => $this->kelurahan,
            'korlap_id' => $this->korlap,
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan,
            'is_active' => $this->is_active
        ]);

        //update area on jukir, merchant dan transaksi Non Tunai
        if($this->area_id_lama != $this->kecamatan){
            if($lokasi->status == 'Non-Tunai' && $lokasi->is_jukir == 1){
                // update on jukir
                $lokasi->jukir()->update([
                    'area_id' => $this->kecamatan
                ]);

                foreach($lokasi->jukir as $jukir){
                    if($jukir->status == "Non-Tunai"){
                        // update on merchant
                        $jukir->merchant->update([
                            'area_id' => $this->kecamatan
                        ]);

                        //update on trans tunai
                        // TransaksiTunai::where('jukir_id', $jukir->id)->update([
                        //     'area_id' => $this->kecamatan
                        // ]);

                        //update on trans non tunai
                        // TransNonTunai::where('merchant_id', $jukir->merchant_id)->update([
                        //     'area_id' => $this->kecamatan
                        // ]);
                    }
                }
            }
        }

        $this->resetForm();

        session()->flash('success', 'Data Lokasi berhasil diupdate!');

        $this->redirectRoute('lokasi.show', ['lokasi' => $lokasi->id]);

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
