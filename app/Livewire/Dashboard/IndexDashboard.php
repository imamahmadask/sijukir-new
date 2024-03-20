<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Dashboard')]
class IndexDashboard extends Component
{
    public $filterYear;

    public function render()
    {
        return view('livewire.dashboard.index-dashboard');
    }

    public function mount()
    {
        $this->filterYear = date('Y');
    }
}
