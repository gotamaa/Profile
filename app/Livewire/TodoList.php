<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|string|max:255')]
    public $name;
    public $search;
    #[Rule('required|min:3|string|max:255')]
    public $newname;
    public $editid;

    public function edit($todoID){
        $this->editid = $todoID;
        $this->newname = Todo::find($todoID)->name;
    }
    public function update(Todo $todo){
        $this->validateOnly('newname');
        Todo::find($this->editid)->update([
            'name' => $this->newname
        ]);
        $this->cancel();
    }
    public function cancel(){
        $this->reset(['newname','editid']);
    }
    public function delete($todoID){
        Todo::find($todoID)->delete();
        session()->flash('message', 'Todo deleted successfully');
    }

    public function toggle($todoId){
        $todo = Todo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }
    public function create(){
        $this->validateOnly('name');
        Todo::create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->resetPage();
        session()->flash('message', 'Todo created successfully');
    }
    public function render()
    {

        return view('livewire.todo-list', ['todos'=>Todo::latest()->where('name','like','%'.$this->search.'%')->paginate(5)]);
    }
}
