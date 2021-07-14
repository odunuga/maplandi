<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class AddToCart extends Component
{
    use CartTraits;

    public $product;
    public $class;
    public $in_cart = false;

    public function mount($product, $class = '')
    {
        $this->product = $product;
        $this->class = $class;
    }

    public function render()
    {
        $this->in_cart = $this->check_cart_item($this->product->sku);
        return view('livewire.add-to-cart');
    }

    public function toggle_item()
    {
        if ($this->check_cart_item($this->product->sku)) {
            $item = $this->get_single_item($this->product->sku);
            $this->delete_cart($item->id);
            $this->emit('alert', ['error', __('shop.cart.remove_item')]);

        } else {
            $symbol = isset($this->product->currency) ? $this->product->currency->symbol : 'N';
            $category = isset($this->product->category) ? $this->product->category->title : '';
            $image = isset($this->product->image->url) ? $this->product->image->url : '';
            $description = isset($this->product->description) ? substr($this->product->description, 0, 100) : '';

            $item =
                [
                    'id' => $this->product->sku,
                    'name' => $this->product->title,
                    'price' => $this->product->price,
                    'quantity' => 1,
                    'attributes' => ['symbol' => $symbol, 'category' => $category, 'image' => $image, 'description' => $description]
                ];
            $this->add_cart($item);
            $this->emit('alert', ['success', __("shop.cart.add_item")]);
        }
        $this->emit('updateItem');


    }
}
