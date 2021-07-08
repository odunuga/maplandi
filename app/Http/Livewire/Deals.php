<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;

class Deals extends Component
{
    public $hot_deals;

    public function mount()
    {
        return $this->hot_deals = Product::with(['category', 'image', 'tags'])->inRandomOrder()->where('hot', 1)->where('published', 1)->where('available', 1)->get()->take(12);
    }

    public function render()
    {
        return view('livewire.deals');
    }
}
