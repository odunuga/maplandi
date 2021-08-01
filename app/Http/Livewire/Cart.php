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
    public $there_is_coupon = false;
    public $promos;
    protected $listeners = ['reloadItems' => '$refresh'];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    public function render()
    {

        $this->calculateTotals();
        $this->update_database();
        return view('livewire.cart', ['items' => $this->get_all_items()]);
    }

    /**
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    private function calculateTotals()
    {
//        $name = 'TAX 7.5%';
//        \Cart::session($this->session_id())->removeCartCondition($name);
        $items = $this->get_all_items();

        $this->sub_total = \Cart::session($this->session_id())->getSubTotal();

        $tax = $this->get_site_settings() && $this->get_site_settings()->tax ? $this->get_site_settings()->tax : 0;
        $this->tax = $tax;

        $this->tax_added = $this->sub_total * ($tax / 100);
        //set tax
        $tax_added = $this->create_tax_condition($tax);
        $this->set_tax_condition($tax_added);

        // get cart conditions
        $set_conditions = $this->get_cart_condition();
        \Cart::session($this->session_id())->condition($set_conditions);

        $cartConditions = $this->get_cart_conditions();
        $this->there_is_coupon = ($cartConditions && count($cartConditions) > 0);
        $this->promos = ($cartConditions && count($cartConditions) > 0) ? $cartConditions : [];
        $this->total = \Cart::session($this->session_id())->getTotal();
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
        $cart = $this->get_all_items();
        set_redirect_with_prev_session('checkout', $this->session_id());
        // redirect user to checkout page
        $this->store_cart_in_db($this->session_id(), $this->get_all_items(), get_user_currency()['id'], get_user_currency()['code']);

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

        if (isset($cart) && $cart !== null && collect($cart)->count() > 0) {
            $conditions = \Cart::session($this->session_id())->getConditions();

            $cart->update([
                'cart' => $this->add_converted_currency($this->get_all_items()),
                'sub_total' => $this->sub_total,
                'payment_currency' => get_user_currency()['id'],
                'payment_symbol' => get_user_currency()['code'],
                'tax_added' => $this->tax_added,
                'total' => $this->total,
                'conditions' => $conditions
            ]);
        }
    }


}
