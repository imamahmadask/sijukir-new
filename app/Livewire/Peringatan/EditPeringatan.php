<?php

namespace App\Livewire\Peringatan;

use App\Models\Jukir;
use App\Models\Peringatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Peringatan')]
class EditPeringatan extends Component
{
    public $peringatanId;
    public $jukirs = [];
    public $riwayat = [];
    public $cicilan = [];
    public $existingCicilan = [];
    public $is_lunas = 0;
    public $kompensasi = 0;
    public $ket, $created_by, $edited_by, $total_bayar;

    #[Validate('required')]
    public $tipe, $tgl_klarifikasi, $no_surat, $selectedJukir, $jml_kurang_setor, $batas_setor, $cara_bayar, $banyak_cicilan ;

    public function render()
    {
        return view('livewire.peringatan.edit-peringatan');
    }

    public function mount($id){
        $this->jukirs = Jukir::with('lokasi')
                        ->where('ket_jukir', 'Active')
                        ->where('status', 'Non-Tunai')
                        ->orderBy('kode_jukir', 'Asc')
                        ->orderBy('nama_jukir', 'Asc')
                        ->get();

        $peringatan = Peringatan::find($id);

        $this->peringatanId = $peringatan->id;
        $this->tipe = $peringatan->tipe;
        $this->tgl_klarifikasi = $peringatan->tgl_klarifikasi;
        $this->no_surat = $peringatan->no_surat;
        $this->jml_kurang_setor = $peringatan->jml_kurang_setor;
        $this->batas_setor = $peringatan->batas_setor;
        $this->total_bayar = $peringatan->total_bayar;
        $this->cara_bayar = $peringatan->cara_bayar;
        $this->banyak_cicilan = $peringatan->banyak_cicilan;
        $this->selectedJukir = $peringatan->jukir_id;
        $this->kompensasi = $peringatan->kompensasi;
        $this->ket = $peringatan->ket;
        $this->created_by = $peringatan->created_by;
        $this->edited_by = $peringatan->edited_by;
        $this->existingCicilan = $peringatan->cicilan;
        $this->riwayat = $peringatan->riwayat;

        for ($i = 0; $i < $this->banyak_cicilan; $i++) {
            if (isset($this->existingCicilan[$i])) {
                $this->cicilan[$i] = $this->existingCicilan[$i];
            } else {
                $this->cicilan[$i] = ['tanggal' => null, 'jumlah' => null];
            }
        }
    }

    public function editPeringatan()
    {
        $this->validate();

        if($this->peringatanId) {
            $peringatan = Peringatan::find($this->peringatanId);

            if($this->cara_bayar == 'Lunas'){
                $this->banyak_cicilan = 0;
                $this->cicilan = [];
            }

            if(!$peringatan->cicilan){
                for($i=1 ; $i<=$this->banyak_cicilan; $i++) {
                    $this->cicilan[] = [
                        'tanggal' => $this->{"tgl_cicilan_" . $i},
                        'jumlah' => $this->{"jml_cicilan_" . $i},
                    ];
                }
            }

            if($this->cara_bayar == 'Nihil' || $this->jml_kurang_setor == 0){
                $this->is_lunas = 1;
            }

            $peringatan->update([
                'tgl_klarifikasi' => $this->tgl_klarifikasi,
                'no_surat' => $this->no_surat,
                'tipe' => $this->tipe,
                'riwayat' =>$this->riwayat,
                'kompensasi' =>$this->kompensasi,
                'jml_kurang_setor' => $this->jml_kurang_setor,
                'batas_setor' => $this->batas_setor,
                'cara_bayar' => $this->cara_bayar,
                'banyak_cicilan' => $this->banyak_cicilan,
                'cicilan' => $this->cicilan,
                'ket' => $this->ket,
                'is_lunas' =>  $this->is_lunas,
                'edited_by' => Auth::user()->name
            ]);

            $this->reset();

            session()->flash('success', 'Data Peringatan berhasil diubah!');

            $this->redirect('/admin/peringatan');
        }
    }

    public function updatedKompensasi($value){
        if($value){
            $total = 0;

            foreach ($this->riwayat as $data) {
                $total += $data['jumlah'];
            }

            $this->jml_kurang_setor = $total - $value;
        }
    }

    public function updatedBanyakCicilan(){
        if($this->banyak_cicilan > count($this->cicilan)){
            $this->cicilan = array_pad($this->cicilan, $this->banyak_cicilan, ['tanggal' => null, 'jumlah' => null]);
        }elseif($this->banyak_cicilan < count($this->cicilan)){
            $this->cicilan = array_slice($this->cicilan, 0, $this->banyak_cicilan);
        }
    }

    public function updatedCaraBayar($value){
        if($value == 'Cicil'){
            $this->banyak_cicilan = 2;
        }elseif($value == 'Lunas' || $value == 'Nihil'){
            $this->banyak_cicilan = 0;
        }
    }

    public function updatedRiwayat($value){
            $total = 0;

            // Iterasi melalui array $riwayat untuk menjumlahkan nilai jumlah
            foreach ($this->riwayat as $data) {
                $total += $data['jumlah'];
            }

            // Set total ke dalam sebuah properti di komponen
            $this->jml_kurang_setor = $total;
    }
}
