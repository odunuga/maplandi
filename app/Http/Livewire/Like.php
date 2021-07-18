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
        $this->like_count = $product->likers()->count();
    }

    public function setLike()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $product = $this->product;
            if ($user->hasLiked($product) == false) {
                $user->like($product);
                $this->emit('alert', ['success', '👍 You Like this ']);
            } else {
                $user->unlike($product);
            }
        } else {
            $this->emit('alert', ['error', 'Login Required']);
        }
    }

    public function render()
    {
        return view('livewire.like');
    }
}
