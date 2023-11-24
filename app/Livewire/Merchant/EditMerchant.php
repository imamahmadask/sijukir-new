<?php

namespace App\Livewire\Merchant;

use App\Models\Area;
use App\Models\Merchant;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Merchant')]
class EditMerchant extends Component
{
    use WithFileUploads;
    public $areas, $merchantId, $qris;

    #[Rule('required')]
    public $id, $nmid, $merchant_name, $vendor, $no_rekening, $tgl_terdaftar, $area_id;

    public function render()
    {
        return view('livewire.merchant.edit-merchant');
    }

    public function mount($id){
        $this->areas = Area::all();

        $merchant = Merchant::findOrFail($id);

        $this->id = $merchant->id;
        $this->merchantId = $merchant->id;
        $this->nmid = $merchant->nmid;
        $this->merchant_name = $merchant->merchant_name;
        $this->vendor = $merchant->vendor;
        $this->no_rekening = $merchant->no_rekening;
        $this->tgl_terdaftar = $merchant->tgl_terdaftar;
        $this->qris = $merchant->qris;
        $this->area_id = $merchant->area_id;
    }

    public function updateMerchant(){
        $this->validate();

        $merchant = Merchant::findOrFail($this->merchantId);

        // setting File QRIS
        if($this->qris == $merchant->qris || $this->qris == null){
            $this->qris = $merchant->qris;
        }else{
            $nama_qris = $this->merchant_name.'.'.$this->qris->extension();
            $this->qris = $this->qris->storeAs('qris', $nama_qris, 'public');
        }

        $merchant->update([
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

        session()->flash('success', 'Data Merchant berhasil diubah!');

        return redirect()->route('merchant.index');
    }
}
