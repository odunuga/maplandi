<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SingleComment extends Component
{
    public $comment;

    public function render()
    {
        return view('livewire.single-comment');
    }
}
