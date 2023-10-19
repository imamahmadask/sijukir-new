<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use App\Models\Lokasi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

#[Title('Tambah Jukir')]
class EditJukir extends Component
{
    use WithFileUploads;

    public $lokasis, $jukirId, $foto_asli, $document_asli, $uji_petik, $potensi_bulanan_upl, 
            $tgl_pkh_upl, $hari_libur, $tgl_akhir_perjanjian, $jenis_jukir;
    public $merchant_id;
    public $bulan, $tahun;
    public $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    public $dayList = [
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
    ];

    #[Rule('required|min:7')] 
    public $kode_jukir; 

    #[Rule('required|min:16')] 
    public $nik_jukir; 
    
    #[Rule('required|date|before_or_equal:today')] 
    public $tgl_lahir, $tgl_perjanjian; 

    #[Rule('required')] 
    public $nama_jukir, $tempat_lahir, $jenis_kelamin, $alamat, $kel_alamat, $kec_alamat, 
            $kab_kota_alamat, $telepon, $agama, $no_perjanjian, $potensi_harian, 
            $potensi_bulanan, $waktu_kerja, $jml_hari_kerja, $hari_kerja_bulan, $lokasi;

    // #[Rule('image|mimes:jpeg,png,jpg,webp|max:2000')] 
    public $foto;

    // #[Rule('mimes:pdf|max:2000')] 
    public $document;

    public function render()
    {
        return view('livewire.jukir.edit-jukir');
    }

    public function mount($id){
        $this->lokasis = Lokasi::select('id', 'titik_parkir')->orderBy('titik_parkir')->get();        
        
        //get Jukir
        $jukir = Jukir::find($id);
            
        //assign
        $this->jukirId = $jukir->id;
        $this->lokasi = $jukir->lokasi_id;
        $this->nama_jukir = $jukir->nama_jukir;
        $this->kode_jukir = $jukir->kode_jukir;
        $this->nik_jukir = $jukir->nik_jukir;
        $this->jenis_kelamin = $jukir->jenis_kelamin;        
        $this->agama = $jukir->agama;        
        $this->tempat_lahir = $jukir->tempat_lahir;        
        $this->tgl_lahir = $jukir->tgl_lahir;        
        $this->alamat = $jukir->alamat;                
        $this->kel_alamat = $jukir->kel_alamat;        
        $this->kec_alamat = $jukir->kec_alamat;        
        $this->kab_kota_alamat = $jukir->kab_kota_alamat;        
        $this->telepon = $jukir->telepon;        
        $this->no_perjanjian = $jukir->no_perjanjian;        
        $this->tgl_perjanjian = $jukir->tgl_perjanjian;        
        $this->jml_hari_kerja = $jukir->jml_hari_kerja;        
        $this->hari_kerja_bulan = $jukir->hari_kerja_bulan;        
        $this->hari_libur = json_decode($jukir->hari_libur);        
        $this->waktu_kerja = $jukir->waktu_kerja;        
        $this->potensi_harian = $jukir->potensi_harian;        
        $this->potensi_bulanan = $jukir->potensi_bulanan;        
        $this->uji_petik = $jukir->uji_petik;        
        $this->potensi_bulanan_upl = $jukir->potensi_bulanan_upl;        
        $this->tgl_pkh_upl = $jukir->tgl_pkh_upl;        
        $this->document_asli = $jukir->document;        
        $this->foto_asli = $jukir->foto; 
        $this->merchant_id = $jukir->merchant_id; 
    }

    public function updateJukir(){
        $this->validate();
        
        $jukir = Jukir::find($this->jukirId);
        
        $area_id = Lokasi::find($this->lokasi)->value('area_id');
        
        $this->tgl_akhir_perjanjian = Carbon::create($this->tgl_perjanjian)->addMonths(6);
        
        if($this->foto == $jukir->foto || $this->foto == null){
            $file_foto = $jukir->foto;
        }else{
            $nama_foto = $this->nama_jukir.'.'.$this->foto->extension();
            $file_foto = $this->foto->storeAs('foto_jukir', $nama_foto, 'public');
        }
        
        if($this->document == $jukir->document || $this->document == null){
            $file_document = $jukir->document;
        }else{
            $nama_document = $this->nama_jukir.'.'.$this->document->extension();
            $file_document = $this->document->storeAs('document_jukir', $nama_document, 'public');
        }        

        $this->setYearAndMonth();

        $jukir->update([
            'kode_jukir' => $this->kode_jukir,
            'nik_jukir' => $this->nik_jukir,
            'nama_jukir' => $this->nama_jukir,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'kel_alamat' => $this->kel_alamat,
            'kec_alamat' => $this->kec_alamat,
            'kab_kota_alamat' => $this->kab_kota_alamat,
            'telepon' => $this->telepon,
            'agama' => $this->agama,
            'jenis_jukir' => "Jukir Utama",
            'status' => "Tunai",
            'jenis_kelamin' => $this->jenis_kelamin,
            'merchant_id' => $this->merchant_id,
            'no_perjanjian' => $this->no_perjanjian,
            'tgl_perjanjian' => $this->tgl_perjanjian,
            'tgl_akhir_perjanjian' => $this->tgl_akhir_perjanjian,
            'potensi_harian' => $this->potensi_harian,
            'potensi_bulanan' => $this->potensi_bulanan,
            'uji_petik' => $this->uji_petik,
            'tgl_pkh_upl' => $this->tgl_pkh_upl,
            'potensi_bulanan_upl' => $this->potensi_bulanan_upl,
            'foto' => $file_foto,
            'document' => $file_document,
            'lokasi_id' => $this->lokasi,
            'ket_jukir' => "Pending",
            'jml_hari_kerja' => $this->jml_hari_kerja,
            'hari_kerja_bulan' => $this->hari_kerja_bulan,
            'waktu_kerja' => $this->waktu_kerja,
            'hari_libur' => json_encode($this->hari_libur),
            'area_id' => $area_id  
        ]);

        $this->reset();

        session()->flash('status', 'Data Jukir berhasil diupdate!');

        $this->redirect('/admin/jukir');
    }       

    private function setYearAndMonth(){
        $this->tahun = Carbon::parse($this->tgl_perjanjian)->format('Y');
        $this->bulan = Carbon::parse($this->tgl_perjanjian)->format('m');
    }

}
