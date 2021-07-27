<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Cart\Entities\SavedItem;
use Modules\Shop\Entities\Product;
use Modules\Shop\Traits\CartTraits;

class SingleSavedItem extends Component
{
    use CartTraits;

    public $product;
    public $check_delete = false;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function add_to_cart($id)
    {
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
        $this->delete_from_saved($id);
        $this->emit('alert', ['success', __("cart.add_item")]);
        $this->emit('updateItem');
        $this->render();
    }

    public function confirm_delete($id)
    {
        $this->check_delete = true;
    }

    public function remove_item($id)
    {
        $this->delete_from_saved($id);
        $this->emit('alert', ['success', __("cart.remove_saved")]);
        $this->render();
    }


    public function render()
    {
        return view('livewire.single-saved-item');
    }
}
