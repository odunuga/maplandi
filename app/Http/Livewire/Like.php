<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Like extends Component
{
    public $product;
    public $like_count = 0;
    public $like_icon = 'lni lni-heart';

    public function mount($product)
    {
        $this->product = $product;
        $this->like_count = $product->likesCount();
    }

    public function setLike()
    {
        dd($this->product);
    }

    public function render()
    {
        return view('livewire.like');
    }
}
