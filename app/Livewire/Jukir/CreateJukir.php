<?php

namespace App\Livewire\Jukir;

use App\Models\Jukir;
use App\Models\Lokasi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

#[Title('Tambah Jukir')]
class CreateJukir extends Component
{
    use WithFileUploads;

    public $lokasis, $tgl_akhir_perjanjian, $status, $tgl_pkh_upl, $jenis_jukir,
            $ket_jukir, $area_id, $merchant_id, $jukir_id, $year, $bulan;
    public $hari_libur = [];

    public $uji_petik = 0;
    public $potensi_bulanan_upl = 0;
    public $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    public $dayList = [
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
    ];

    #[Validate('required|min:7|unique:jukirs,kode_jukir')]
    public $kode_jukir;

    #[Validate('required|min:16|numeric|unique:jukirs,nik_jukir')]
    public $nik_jukir;

    #[Validate('required|date|before_or_equal:today')]
    public $tgl_lahir, $tgl_perjanjian;

    #[Validate('required')]
    public $nama_jukir, $tempat_lahir, $jenis_kelamin, $alamat, $kel_alamat, $kec_alamat,
            $kab_kota_alamat, $telepon, $agama, $no_perjanjian, $potensi_harian,
            $potensi_bulanan, $waktu_kerja, $jml_hari_kerja, $hari_kerja_bulan, $lokasi;

    #[Validate('required|image|mimes:jpeg,png,jpg,webp|max:2000')]
    public $foto;

    #[Validate('required|mimes:pdf|max:2000')]
    public $document;

    public function render()
    {
        return view('livewire.jukir.create-jukir');
    }

    public function mount(){
        $this->lokasis = Lokasi::select('id', 'titik_parkir')->orderBy('titik_parkir')->get();
        $this->no_perjanjian = "550/".sprintf('%04s', Jukir::count() + 1)."/UPTD.P/PK/".$this->array_bln[date('n')]."/".Carbon::now()->format('Y');
    }

    public function addJukir(){
        $this->validate();
        $area_id = Lokasi::find($this->lokasi)->value('area_id');

        $this->tgl_akhir_perjanjian = Carbon::create($this->tgl_perjanjian)->addMonths(6);

        $this->setFotoJukir();

        $this->setDocumentJukir();

        $this->setYearAndMonth();

        $this->merchant_id = random_int(1, 1000);

        $jukir = Jukir::create([
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
            'foto' => $this->foto,
            'document' => $this->document,
            'lokasi_id' => $this->lokasi,
            'ket_jukir' => "Pending",
            'jml_hari_kerja' => $this->jml_hari_kerja,
            'hari_kerja_bulan' => $this->hari_kerja_bulan,
            'waktu_kerja' => $this->waktu_kerja,
            'hari_libur' => json_encode($this->hari_libur),
            'area_id' => $area_id
        ]);

        // update is Jukir menjadi 1 di tabel lokasi
        $this->changeIsJukirLokasiBaru($this->lokasi);

        $this->reset();

        session()->flash('success', 'Data Jukir berhasil dibuat!');

        $this->redirectRoute('jukir.show', ['jukir' => $jukir->id]);
    }

    private function setFotoJukir(){
        $nama_foto = $this->nama_jukir . '_' . $this->kode_jukir . '.' . $this->foto->extension();
        $this->foto = $this->foto->storeAs("foto_jukir", $nama_foto, 'public');
    }

    private function setDocumentJukir(){
        $nama_document = $this->nama_jukir . '_' . $this->kode_jukir . '.' . $this->document->extension();
        $this->document = $this->document->storeAs("document_jukir", $nama_document, 'public');
    }

    private function setYearAndMonth(){
        $this->year = Carbon::parse($this->tgl_perjanjian)->format('Y');
        $this->bulan = Carbon::parse($this->tgl_perjanjian)->format('m');
    }

    public function updatedHariKerjaBulan($value){
        if ($value > 0 && $this->potensi_harian > 0) {
            $this->potensi_bulanan = $this->hari_kerja_bulan * $this->potensi_harian;
        }
        if ($value > 0 && $this->uji_petik > 0) {
            $this->potensi_bulanan_upl = $this->hari_kerja_bulan * $this->uji_petik;
        }
    }

    public function updatedPotensiHarian($value){
        if ($value > 0 && $this->hari_kerja_bulan > 0) {
            $this->potensi_bulanan = $this->hari_kerja_bulan * $this->potensi_harian;
        }
    }

    public function updatedUjiPetik($value){
        if ($value > 0 && $this->hari_kerja_bulan > 0) {
            $this->potensi_bulanan_upl = $this->hari_kerja_bulan * $this->uji_petik;
        }
    }

    public function changeIsJukirLokasiBaru($id){
        $lokasi = Lokasi::find($id);

        if ($lokasi->is_jukir == 0) {
            $lokasi->update([
                'is_jukir' => 1,
            ]);
        }
    }
}
