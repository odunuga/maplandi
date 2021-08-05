<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;

class Like extends Component
{
    public $product;
    public $like_count = 0;
    public $liked;
    public $like_icon = 'lni lni-heart';
    protected $listeners = ['update_like' => '$refresh'];

    public function mount(Product $product)
    {
        $this->product = $product;
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
            $this->emit('update_like');
        } else {
            $this->emit('alert', ['error', 'Login Required']);
        }
    }

    public function render()
    {
        $this->liked = auth()->check() && auth()->user()->hasLiked($this->product) === true ? 'bg-danger text-white' : '';
        $this->like_count = $this->product->likers()->count();
        return view('livewire.like');
    }
}
