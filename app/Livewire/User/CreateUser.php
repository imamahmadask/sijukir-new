<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUser extends Component
{
    #[Validate('required', 'string', 'max:255')]
    public $name;

    #[Validate('required', 'string', 'email', 'max:255', 'unique:users')]
    public $email;

    #[Validate('required', 'string',)]
    public $password;

    public $role;

    public function render()
    {
        return view('livewire.user.create-user');
    }

    public function addUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Data User berhasil ditambah!');

        $this->redirectRoute('users.index');
    }
}
