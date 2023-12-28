<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Users')]
class IndexUser extends Component
{

    #[Computed()]
    public function users()
    {
        return User::all();
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
