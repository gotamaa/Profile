<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Submitbutton extends Component
{
    use WithPagination;

    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|min:8')]
    public $password;
    #[Rule('required|email')]

    public $email;

    public function submit(){
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        User::create([
            'email' => $this->email,
            'name'=> $this->name,
            'password' => $this->password
        ]);
        $this->reset(['name','email','password']);
        request()->session()->flash('message', 'user created succesfully');
    }
    public function render()
    {
        $user=User::paginate(1);
        return view('livewire.submitbutton',['users' => $user]);
    }
}
