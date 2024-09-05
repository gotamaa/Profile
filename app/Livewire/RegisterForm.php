<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;

class RegisterForm extends Component
{
    #[Rule('required|min:3|max:255')]
    public $name;
    #[Rule('required|email|unique:users,email')]
    public $email;
    #[Rule('required|min:8|max:255')]
    public $password;

    public function register()
    {
        // Validate the input fields
        $this->validate();

        // Create the user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Reset the form fields
        $this->reset(['name', 'email', 'password']);

        // Flash a success message
        session()->flash('message', 'User created successfully');
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
