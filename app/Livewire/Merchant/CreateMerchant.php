<?php

namespace App\Livewire\Merchant;

use App\Models\Area;
use App\Models\Merchant;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Merchant')]
class CreateMerchant extends Component
{
    use WithFileUploads;

    public $areas;

    #[Rule('required|unique:merchant.id')]
    public $id;

    #[Rule('required')]
    public $nmid, $merchant_name, $vendor, $no_rekening, $tgl_terdaftar, $area_id;

    #[Rule('required|mimes:pdf|max:2000')]
    public $qris;

    public function render()
    {
        return view('livewire.merchant.create-merchant');
    }

    public function mount(){
        $this->areas = Area::all();
    }

    public function addMerchant(){
        $this->validate();

        $nama_qris = $this->merchant_name . '.' . $this->qris->extension();
        $this->qris = $this->qris->storeAs("qris", $nama_qris, 'public');

        Merchant::create([
            'id' => $this->id,
            'merchant_name' => $this->merchant_name,
            'vendor' => $this->vendor,
            'nmid' => $this->nmid,
            'no_rekening' => $this->no_rekening,
            'tgl_terdaftar' => $this->tgl_terdaftar,
            'area_id' => $this->area_id,
            'qris' => $this->qris
        ]);

        $this->reset();

        session()->flash('success', 'Data Merchant berhasil ditambahkan!');

        return redirect()->route('merchant.index');

    }
}
