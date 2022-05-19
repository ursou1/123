<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
    public $count1 = 0;
    public $count = 0;
    public $name = "";
    public $change = false;
    public $lolkek = 'lol';

    public function changeOption()
    {
        $this->name = $this->lolkek;
    }
    public function increment()
    {
        $this->count++;
        $this->count1 = $this->count * $this->count;
        alert('майонезний шлепок');
    }
    public function  click(){
     $this->name = "";
    }
}
