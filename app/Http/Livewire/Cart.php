<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Cart\Entities\CartRecord;
use Modules\Shop\Traits\CartTraits;

class Cart extends Component
{
    use CartTraits;

    public $total = 0.0;
    public $tax = 0.0;
    public $tax_added = 0.0;
    public $sub_total = 0.0;
    protected $listeners = ['reloadItems' => 'reloadCartItems'];

    public function reloadCartItems()
    {
        $this->render();
    }

    public function render()
    {
        $this->calculateTotals();
        $this->update_database();
        return view('livewire.cart', ['items' => $this->get_all_items(),]);
    }

    private function calculateTotals()
    {
        $sub_total = 0;
        $items = $this->get_all_items();
        foreach ($items as $item) {
            $sub_total += $this->set_amount($item['attributes']['code'], $item['price'] * $item['quantity']);
        }
        $this->sub_total = $sub_total;
        $tax = $this->get_site_settings() && $this->get_site_settings()->tax ? $this->get_site_settings()->tax : 0;
        $this->tax = $tax;
        $tax_per = $sub_total != 0 ? ($sub_total * ($tax / 100)) : 0;
        $this->tax_added = $tax_per;
        $this->total = $sub_total + $tax_per;
    }

    public function gotoCheckout()
    {
        // store Cart in Cache and redirect user to login
        $checker = $this->check_session_cart();
        if ($checker->count() > 0) {
            $check2 = $checker->first();
            if (isset($check2->cleared) && $check2->cleared === false) {
                $cart = $check2;
                return redirect()->route('checkout', ['cart' => $cart]);
            }
        }
        // check if cart is not empty
        $current_cart = $this->get_all_items();
        if ($current_cart != null && count($current_cart) > 0) {
            $cart = $current_cart;
        }

        set_redirect_with_prev_session('checkout', $this->session_id());
        // redirect user to checkout page
        CartRecord::create([
            'session_id' => $this->session_id(),
            'cart' => isset($cart) && count($cart) > 0 ? $this->add_converted_currency($this->get_all_items()) : '',
            'sub_total' => $this->sub_total,
            'payment_currency' => get_user_currency()['id'],
            'payment_symbol' => get_user_currency()['code'],
            'tax_added' => $this->tax_added,
            'total' => $this->total,
        ]);

        return redirect()->route('checkout');
    }

    private function update_database()
    {
        $check_cart = \Modules\Shop\Entities\Cart::where('session_id', $this->session_id());
        if ($check_cart->count() > 0) {
            $cart = $check_cart->first();
        } else {
            $check_cart_record = CartRecord::where('session_id', $this->session_id());
            if ($check_cart_record->count() > 0) {
                $cart = $check_cart_record->first();
            }
        }

        if (isset($cart) && $cart != null && count($cart) > 0) {
            $cart->update([
                'cart' => $this->add_converted_currency($this->get_all_items()),
                'sub_total' => $this->sub_total,
                'payment_currency' => get_user_currency()['id'],
                'payment_symbol' => get_user_currency()['code'],
                'tax_added' => $this->tax_added,
                'total' => $this->total,
            ]);
        }
    }

    private function add_converted_currency($items, $code = null)
    {
        $new_record = [];
        foreach ($items as $item) {
            $new_record[] = ['id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'attributes' => [
                    'symbol' => $item['attributes']['symbol'],
                    'code' => $item['attributes']['code'],
                    'category' => $item['attributes']['category'],
                    'image' => $item['attributes']['image'],
                    'description' => $item['attributes']['description'],
                    'amount' => $this->set_amount($item['attributes']['code'], $item['price'] * $item['quantity'], $code)
                ]
            ];
        }
        return $new_record;
    }


}
