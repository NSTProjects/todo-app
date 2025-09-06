<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Todo extends Component
{
    #[Title('Todo')]

    public $todo = "";
    public $todos = [];
    public function add()
    {
        // dd($this->todo);
        $this->todos[] = $this->todo;
        $this->reset('todo');
    }
    public function render()
    {
        return view('livewire.todo');
    }
}
