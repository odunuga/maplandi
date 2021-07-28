<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Traits\CartTraits;

class AddToCart extends Component
{
    use CartTraits;

    public $product;
    public $class;
    public $style = null;
    public $text;
    public $in_cart = false;

    public function mount(Product $product, $class = '', $text = false)
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
            $this->add_item_stock($this->product);
            $this->emit('alert', ['error', __('cart.remove_item')]);
        } else {
            // check if product exist in stock
            if ($this->check_product_stock($this->product)) {
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
                        'attributes' => [
                            'symbol' => $symbol,
                            'code' => $symbol_code,
                            'category' => $category,
                            'image' => $image,
                            'description' => $description
                        ]
                    ];
                $this->add_cart($item);
                $this->reduce_stock_value($this->product);
                $this->emit('alert', ['success', __("cart.add_item")]);
                $this->emit('updateItem');
            } else {
                $this->emit('alert', ['error' => __('cart.empty_stock')]);
            }
        }

    }

    private function check_product_stock($product)
    {
        if ($product->stock > 0) {
            return true;
        }
        return false;
    }

    private function reduce_stock_value($product)
    {
        --$product->stock;
        return $product->update();
    }

    private function add_item_stock($product)
    {
        ++$product->stock;
        return $product->update();
    }
}
