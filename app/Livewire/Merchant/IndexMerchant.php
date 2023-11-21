<?php

namespace App\Livewire\Merchant;

use App\Models\Merchant;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Merchant')]
class IndexMerchant extends Component
{
    use WithPagination;

    public $merchant_name, $merchantId;
    public $search = '';
    public $filter = '';
    public $perPage = 50;

    #[Computed()]
    public function merchants(){
         return Merchant::select('id', 'merchant_name', 'vendor', 'no_rekening', 'qris')
                    ->where(function ($query) {
                        $query->orWhere('merchant_name', 'like', '%'.$this->search.'%');
                    })
                    ->where(function ($query) {
                        $query->where('vendor', 'like', '%'.$this->filter.'%');
                    })
                    ->orderBy('vendor', 'desc')
                    ->orderBy('merchant_name', 'asc')
                    ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.merchant.index-merchant');
    }

    public function deleteMerchant(Merchant $merchant){
        //destroy
        $merchant->delete();

        unlink("storage/".$merchant->qris);

        session()->flash('success', 'Data Merchant Berhasil Dihapus.');

    }
}
