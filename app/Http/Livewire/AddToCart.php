<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Traits\CartTraits;

class AddToCart extends Component
{
    use CartTraits;

    public $product;
    public $class;
    public $style = null;
    public $text;
    public $in_cart = false;

    public function mount($product, $class = '', $text = false)
    {
        $this->product = $product;
        $this->class = $class;
        $this->text = $text;
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
            $this->emit('alert', ['error', __('cart.remove_item')]);

        } else {
            $symbol = isset($this->product->currency) ? $this->product->currency->symbol : '';
            $symbol_code = isset($this->product->currency) ? $this->product->currency->code : '';
            $category = isset($this->product->category) ? $this->product->category->title : '';
            $image = isset($this->product->image->url) ? $this->product->image->url : '';
            $description = isset($this->product->description) ? substr($this->product->description, 0, 100) : '';
            $item =
                [
                    'id' => $this->product->sku,
                    'name' => $this->product->title,
                    'price' => $this->product->price,
                    'quantity' => 1,
                    'attributes' => ['symbol' => $symbol, 'code' => $symbol_code, 'category' => $category, 'image' => $image, 'description' => $description]
                ];
            $this->add_cart($item);
            $this->emit('alert', ['success', __("cart.add_item")]);
        }
        $this->emit('updateItem');


    }
}
