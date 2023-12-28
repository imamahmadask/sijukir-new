<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users')]
class IndexUser extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;

    #[Computed()]
    public function users()
    {
        return User::where('name', 'like' ,'%'.$this->search.'%')
                    ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.user.index-user');
    }

    public function deleteUser(User $user){
        //destroy
        $user->delete();

        //flash message
        session()->flash('success', 'Data User Berhasil Dihapus.');

    }
}
