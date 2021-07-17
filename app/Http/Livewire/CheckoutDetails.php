<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutDetails extends Component
{
    private $cart_details;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;

    public function mount($cart)
    {
        $this->cart_details = $cart;
        $this->first_name = auth()->user()->shipping_address ? auth()->user()->shipping_address->first_name : auth()->user()->name;
        $this->last__name = auth()->user()->shipping_address ? auth()->user()->shipping_address->last_name : auth()->user()->name;
        $this->email = auth()->user()->shipping_address ? auth()->user()->shipping_address->email : auth()->user()->email;
        $this->phone = auth()->user()->shipping_address ? auth()->user()->shipping_address->phone : auth()->user()->phone;
        $this->address = auth()->user()->shipping_address ? auth()->user()->shipping_address->address : '';
    }

    public function payment_gateway(){

    }
    public function render()
    {
        return view('livewire.checkout-details',['cart_details'=>$this->cart_details]);
    }
}
