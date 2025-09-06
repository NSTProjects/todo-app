<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
    #[Title('Counter')]

    public $counter = 0;
    public function increment($by)
    {
        // dd("Increment");
        $this->counter = $this->counter + $by;
    }
    public function decrement()
    {
        // dd("Increment");
        $this->counter--;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
