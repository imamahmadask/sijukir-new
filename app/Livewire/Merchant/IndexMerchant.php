<?php

namespace App\Livewire\Merchant;

use App\Models\Merchant;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Merchant')]
class IndexMerchant extends Component
{
    use WithPagination;

    public $merchant_name;

    public function render()
    {
        $merchants = Merchant::orderBy('vendor', 'desc')
                    ->orderBy('merchant_name', 'asc')
                    ->simplePaginate(50);

        return view('livewire.merchant.index-merchant', [
            'merchants' => $merchants
        ]);
    }
}
