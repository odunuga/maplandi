<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Traits\RatingTraits;

class Deals extends Component
{
    use RatingTraits;

    public $hot_deals;

    protected $listeners = ['rated' => 'implement_rating'];

    public function mount($hot_deals)
    {
        $this->hot_deals = $hot_deals;
    }


    public function render()
    {
        return view('livewire.deals', ['hot_deals' => $this->hot_deals]);
    }
}
