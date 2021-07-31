<?php

namespace App\Http\Livewire;

use Darryldecode\Cart\CartCondition;
use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\Promotion;
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

    /**
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     *
     */
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
                $symbol_code = isset($this->product->currency) ? $this->product->currency->code : 'NGN';
                $category = isset($this->product->category) ? $this->product->category->title : '';
                $image = isset($this->product->image->url) ? $this->product->image->url : '';
                $description = isset($this->product->description) ? substr($this->product->description, 0, 100) : '';
                $buying_code = get_user_currency()['code'];
                $buying_symbol = get_currency_symbol_from_id(get_user_currency()['id']); //
                $price = $this->set_amount($buying_code, $this->product->price);


                $condition = $this->get_condition($this->product->id);
                $item = $condition ?
                    [
                        'id' => $this->product->sku,
                        'name' => $this->product->title,
                        'price' => $price ?: $this->product->price,
                        'quantity' => 1,
                        'attributes' => [
                            'selling_symbol' => $symbol,
                            'selling_code' => $symbol_code,
                            'buying_code' => $price ? $buying_code : $symbol_code,
                            'buying_symbol' => $buying_symbol,
                            'selling_price' => $this->product->price,
                            'category' => $category,
                            'image' => $image,
                            'description' => $description
                        ],
                        'conditions' => $condition
                    ] :
                    [
                        'id' => $this->product->sku,
                        'name' => $this->product->title,
                        'price' => $price,
                        'quantity' => 1,
                        'attributes' => [
                            'selling_symbol' => $symbol,
                            'selling_code' => $symbol_code,
                            'buying_code' => $buying_code,
                            'buying_symbol' => $buying_symbol,
                            'selling_price' => $this->product->price,
                            'category' => $category,
                            'image' => $image,
                            'description' => $description
                        ],
                    ];
                $this->add_cart($item);
                $this->reduce_stock_value($this->product);
                $this->emit('alert', ['success', __("cart.add_item")]);
            } else {
                $this->emit('alert', ['error' => __('cart.empty_stock')]);
            }
        }
        $this->emit('updateItem');

    }

    private function check_product_stock($product)
    {
        if ($product->stock > 0) {
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return array
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     *
     */
    private function get_condition($id)
    {
        $condition = [];
        $check_conditions = Promotion::where('condition', 1);
        if ($check_conditions->count() > 0) {
            $conditions = $check_conditions->get();
            foreach ($conditions as $each) {
                $products = collect($each->products);
                if ($products->contains((int)$id)) {
                    $condition[] = new CartCondition([
                        'name' => $each->title,
                        'type' => 'promo',
                        'value' => $each->rate,
                    ]);
                }
            }
        }
        // check all promotion if there is any that is for product base
        return $condition;
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
