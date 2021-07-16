<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class CartItem extends Component
{
    use CartTraits;

    public $item;
    public $confirm_delete;
    public $new_amount;
    public function mount($item )
    {
        $this->item = $item;
    }

    public function removeItem()
    {
        $this->delete_cart($this->item['id']);
        $this->emit('reloadItems', []);
    }

    public function confirmDelete()
    {
        $this->confirm_delete = $this->item['id'];
    }

    public function cancelDelete()
    {
        $this->confirm_delete = null;
    }

    public function decrement()
    {
        if ((int)$this->item['quantity'] > 0) {
            $this->update_cart($this->item['id'], ['quantity' => -1]);
            $this->item = (object)$this->get_single_item($this->item['id']);
        }
        $this->emit('reloadItems', []);
    }

    public function increment()
    {
        if ((int)$this->item['quantity'] < 51) {
            $this->update_cart($this->item['id'], ['quantity' => +1]);
            $this->item = (object)$this->get_single_item($this->item['id']);
        }
        $this->emit('reloadItems', []);
    }

    public function calculate_new_amount()
    {
        // calculate new currency amount
//        dd($this->item);
        $this->new_amount = $this->set_amount($this->item['attributes']['code'], $this->item['price'] * $this->item['quantity']);
    }

    public function render()
    {
        $this->calculate_new_amount();
        return view('livewire.cart-item');
    }
}
