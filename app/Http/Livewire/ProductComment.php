<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductComment extends Component
{
    private $comments;

    public function mount($comments)
    {
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.product-comment', ['comments' => $this->comments]);
    }

    public function sendNewComment()
    {
        dd('here');
    }
}
