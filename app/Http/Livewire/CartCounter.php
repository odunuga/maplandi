<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class CartCounter extends Component
{
    use CartTraits;

    public $count;
    protected $listeners = ['updateItem' => 'updateCount'];

    public function updateCount()
    {
        return $this->render();
    }

    public function render()
    {
        $this->count = $this->cart_count();
        return view('livewire.cart-counter');
    }
}
