<?php

namespace App\Livewire\Peringatan;

use App\Models\Jukir;
use App\Models\Peringatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Tambah Peringatan')]
class CreatePeringatan extends Component
{
    public $jukirs = [];
    public $riwayat = [];
    public $cicilan = [];
    public $tahun = ['2022', '2023'];
    public $jml_cicilan_1, $jml_cicilan_2, $jml_cicilan_3, $tgl_cicilan_1, $tgl_cicilan_2, $tgl_cicilan_3;
    public $kurang_setor_2022, $kurang_setor_2023, $total_kurang_setor = 0;
    public $is_lunas = 0;
    public $kompensasi = 0;
    public $ket, $created_by, $edited_by;

    #[Validate('required')]
    public $tipe, $tgl_klarifikasi, $no_surat,  $selectedJukir, $jml_kurang_setor, $batas_setor, $cara_bayar, $banyak_cicilan ;

    public function render()
    {
        return view('livewire.peringatan.create-peringatan');
    }

    public function mount()
    {
        $this->jukirs = Jukir::with('lokasi')
                        ->where('ket_jukir', 'Active')
                        ->where('status', 'Non-Tunai')
                        ->orderBy('kode_jukir', 'Asc')
                        ->orderBy('nama_jukir', 'Asc')
                        ->get();

        $this->no_surat = "550/000/UPTD.P/SP/2023";
    }

    public function addPeringatan()
    {
        $this->validate();

        foreach ($this->tahun as $tahun) {
            $this->riwayat[] = [
                'tahun' => $tahun,
                'jumlah' => $this->{"kurang_setor_" . $tahun},
            ];
        }

        for($i=1 ; $i<=$this->banyak_cicilan; $i++) {
            $this->cicilan[] = [
                'tanggal' => $this->{"tgl_cicilan_" . $i},
                'jumlah' => $this->{"jml_cicilan_" . $i},
            ];
        }
        if($this->cara_bayar == 'Nihil' || $this->jml_kurang_setor == 0){
            $this->is_lunas = 1;
        }

        Peringatan::create([
            'tgl_klarifikasi' => $this->tgl_klarifikasi,
            'no_surat' => $this->no_surat,
            'tipe' => $this->tipe,
            'jukir_id' => $this->selectedJukir,
            'riwayat' => $this->riwayat,
            'kompensasi' => $this->kompensasi,
            'jml_kurang_setor' => $this->jml_kurang_setor,
            'batas_setor' => $this->batas_setor,
            'cara_bayar' => $this->cara_bayar,
            'banyak_cicilan' => $this->banyak_cicilan,
            'cicilan' => $this->cicilan,
            'ket' => $this->ket,
            'is_lunas' =>  $this->is_lunas,
            'created_by' => Auth::user()->name
        ]);

        $this->reset();

        session()->flash('success', 'Data Peringatan berhasil ditambah!');

        $this->redirect('/admin/peringatan');
    }

    public function updatedSelectedJukir($value){
        $jukir = Jukir::find($value);
        // $this->kurang_setor_2022 = $jukir->summaryJukirMonth->where('tahun', 2022)->sum('kurang_setor') * -1;
        // $this->kurang_setor_2023 = $jukir->summaryJukirMonth->where('tahun', 2023)->sum('kurang_setor') * -1;
        $this->kurang_setor_2022 = 10000;
        $this->kurang_setor_2023 = 20000;

        if($this->kurang_setor_2022 < 0){
            $this->kurang_setor_2022 = 0;
        }
        if($this->kurang_setor_2023 < 0){
            $this->kurang_setor_2023 = 0;
        }

        $this->jml_kurang_setor = $this->kurang_setor_2022 + $this->kurang_setor_2023;
    }

    public function updatedKompensasi($value){
        if($value >= 0){
            $this->jml_kurang_setor = $this->kurang_setor_2022 + $this->kurang_setor_2023 - $this->kompensasi;
        }
    }

    public function updatedCaraBayar($value){
        if($value == 'Cicil'){
            $this->banyak_cicilan = 2;
        }elseif($value == 'Lunas' || $value == 'Nihil'){
            $this->banyak_cicilan = 0;
        }
    }

    public function updatedKurangSetor2022($value){
        if($value >= 0){
            $this->jml_kurang_setor = $this->kurang_setor_2022  + $this->kurang_setor_2023 - $this->kompensasi;
        }
    }

    public function updatedKurangSetor2023($value){
        if($value >= 0){
            $this->jml_kurang_setor = $this->kurang_setor_2022 + $this->kurang_setor_2023  - $this->kompensasi;
        }
    }
}
