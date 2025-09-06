<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class HelloWorld extends Component
{
    #[Title('Home')]
    public function render()
    {
        return view('livewire.hello-world');
    }
}
