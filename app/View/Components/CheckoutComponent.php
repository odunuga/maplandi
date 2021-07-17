<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Shop\Traits\CartTraits;

class CheckoutComponent extends Component
{
    use CartTraits;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (auth()->check() != true) {
            redirect()->route('login');
        }
        $check_cart = $this->fetch_cart();
        if ($check_cart) {
            \Cart::session($this->session_id())->add($check_cart->cart);
            $cart_details = $this->move_previous_session_cart($check_cart->session_id);
        } else {
            $cart_details = $this->get_cart($this->session_id());
        }
        return view('components.checkout-component', ['cart_details' => $cart_details]);
    }
}
