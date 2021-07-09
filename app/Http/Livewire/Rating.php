<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rating extends Component
{
    public $deal;
    public $key;

    public function render()
    {
        return view('livewire.rating');
    }
}
