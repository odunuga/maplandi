<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class CartItem extends Component
{
    use CartTraits;

    public $item;
    public $confirm_delete = false;
    public $new_amount;
    public $promos;

    public function mount($item)
    {
        $this->item = $item;
        $con = isset($item['conditions']) ? $item['conditions'] : '';
        $this->sort_conditions($con);
    }

    private function sort_conditions($condition)
    {
        $v = '';
        if ($condition) {
            foreach ($condition as $item) {
//                dd($item);
                $v .= '<p class="text-danger font-500"> ' . $item->getName() . '</p>';
            }
        }
        $this->promos = $v;
    }

    public function removeItem()
    {
        $this->delete_cart($this->item['id']);
        $this->emitUp('reloadItems', '$refresh');
        $this->emit('updateItem');
    }

    public function confirmDelete()
    {
        $this->confirm_delete = true;
    }

    public function cancelDelete()
    {
        $this->confirm_delete = false;
    }

    public function decrement()
    {
        if ((int)$this->item['quantity'] > 0) {
            $this->update_cart($this->item['id'], ['quantity' => -1]);
            $this->item = (object)$this->get_single_item($this->item['id']);
        }
        $this->emit('reloadItems');
    }

    public function save_item($id)
    {
        $this->add_to_saved($id);
        $this->delete_from_saved($id);
        $this->emit('reloadItems' );
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
            $this->new_amount = $this->item['price'] * $this->item['quantity'];
    }

    public function render()
    {
        $this->calculate_new_amount();
        return view('livewire.cart-item');
    }
}
