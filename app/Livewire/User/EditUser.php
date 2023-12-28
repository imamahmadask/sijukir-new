<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditUser extends Component
{
    #[Validate('required')]
    public $userId, $name, $email, $role;

    public function render()
    {
        return view('livewire.user.edit-user');
    }

    #[On('edit-user')]
    public function getUser($id)
    {
        $user = User::find($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function editUser()
    {
        $this->validate();

        $user = User::find($this->userId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role
        ]);

        session()->flash('success', 'Data user berhasil diupdate!');

        $this->redirectRoute('users.index');

    }
}
