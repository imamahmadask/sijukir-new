<?php

namespace App\Livewire\Nontunai;

use App\Models\Merchant;
use App\Models\NonTunai;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Non-Tunai Detail')]
class ShowNontunai extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $merchant_name, $merchant_id;

    #[Validate('date|before_or_equal:finish_date')]
    public $date_start;

    #[Validate('date|after_or_equal:start_date|before_or_equal:today')]
    public $date_end;

    public function render()
    {
        return view('livewire.nontunai.show-nontunai');
    }

    public function mount(HttpRequest $request, $merchant_id){

        $this->merchant_id = $merchant_id;
        $merchant = Merchant::find($this->merchant_id);
        $this->merchant_name = $merchant->merchant_name;

        if($request->has('start_date') && $request->has('end_date')){
            $this->date_start = $request->query('start_date');
            $this->date_end = $request->query('end_date');
        }else{
             $this->date_end = Carbon::today()->toDateString();
            $this->date_start =  Carbon::today()->subDays(14)->toDateString();
        }

    }

    #[Computed()]
    public function nontunais($merchant_id){
        $start_date = Carbon::parse( $this->date_start)->startOfDay();
        $finish_date = Carbon::parse( $this->date_end)->endOfDay();

        if ($merchant_id > 1000)
        {
            $nonTunai = NonTunai::select('tgl_transaksi', 'merchant_name', 'issuer_name', 'syslog', 'total_nilai', 'status')
                ->where('merchant_id', '=', $merchant_id)
                ->whereBetween('tgl_transaksi', [$start_date, $finish_date])
                ->where('status', 'SUCCEED')
                ->orderBy('tgl_transaksi', 'Desc')
                ->simplePaginate($this->perPage);
        }
        else
        {
            $nonTunai = null;
        }
        return $nonTunai;
    }
}
