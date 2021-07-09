<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;

class Deals extends Component
{
    public $hot_deals;

    protected $listeners = ['rated' => 'implement_rating'];

    public function implement_rating(array $value)
    {
        $filter_product_id = (int)trim(substr($value['id'], -1, 1));

        $filter_rating_value = (float)trim($value['value']);
        if (auth()->check()) {
            $deal = Product::where('id', $filter_product_id)->firstOrFail();
            auth()->user()->rate($deal, $filter_rating_value);
            $this->emit('alert', ['success', 'Rating Saved']);
        } else {
            $this->emit('alert', ['error', 'You Are Not logged In']);
        }

    }

    public function mount()
    {
        return $this->hot_deals = Product::with(['category', 'image', 'tags', 'currency'])->inRandomOrder()->where('hot', 1)->where('published', 1)->where('available', 1)->get()->take(12);
    }

    public function render()
    {
        return view('livewire.deals');
    }
}
