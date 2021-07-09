<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;

class Latest extends Component
{
    public $latest_products = [];
    public $random_products = [];
    public $popular_products = [];
    public $take = 8;

    public function mount()
    {
        $this->get_latest();
        $this->get_random();
        $this->get_popular();
    }

    private function get_latest()
    {
        $this->latest_products = Product::with(['image', 'tags', 'category', 'currency'])->latest()->where('published', 1)->where('available', 1)->get()->take($this->take);

    }

    private function get_random()
    {
        $this->random_products = Product::with(['image', 'tags', 'category', 'currency'])->inRandomOrder()->where('published', 1)->where('available', 1)->get()->take($this->take);
    }

    private function get_popular()
    {
        $this->popular_products = Product::orderByViews()->with(['image', 'tags', 'category', 'currency'])->where('published', 1)->where('available', 1)->get()->take($this->take);
    }

    public function render()
    {
        return view('livewire.latest');
    }
}
