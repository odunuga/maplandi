<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class CartModal extends Component
{
    use CartTraits;

    public $items;
    protected $listeners = ['updateItem' => 'updateCart'];


    public function updateCart()
    {
        $this->render();
    }

    public function render()
    {
        $items = $this->get_all_items();
        $this->items = $items;
        return view('livewire.cart-modal', ['items' => $items]);
    }
}
