<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Unicodeveloper\Paystack\Facades\Paystack;

class CheckoutDetails extends Component
{
    public $cart_details;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $total_in_kobo;

    protected $rules = [
        'first_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => ['required', 'min:10']
    ];

    public function mount()
    {
        $this->first_name = auth()->user()->shipping_address ? auth()->user()->shipping_address->first_name : auth()->user()->name;
        $this->last_name = auth()->user()->shipping_address ? auth()->user()->shipping_address->last_name : auth()->user()->name;
        $this->email = auth()->user()->shipping_address ? auth()->user()->shipping_address->email : auth()->user()->email;
        $this->phone = auth()->user()->shipping_address ? auth()->user()->shipping_address->phone : auth()->user()->phone;
        $this->address = auth()->user()->shipping_address ? auth()->user()->shipping_address->address : '';
    }


    public function cal_total_in_kobo()
    {
        $total = (double)$this->cart_details['total'];
        // if naira, convert to kobo
        $this->total_in_kobo = $total * 100;

    }

    public function submitCheckout()
    {
        $this->validate();
        $payment_data = [
            "email" => $this->email,
            "cartId" => $this->cart_details['id'],
            "amount" => $this->total_in_kobo,
            "currency" => get_user_currency()['code'],
            "metadata" => json_encode(['cart' => $this->cart_details['cart'], 'address' => ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'phone' => $this->phone, 'address' => $this->address]]),
            "reference" => Paystack::genTranxRef()
        ];
        return \Redirect::route('pay')->with($payment_data);
    }

    public function pay_on_delivery_order_confirmation()
    {
        // prepare order with details and send to order table


    }

    public function render()
    {
        $this->cal_total_in_kobo();
        return view('livewire.checkout-details', ['cart_details' => $this->cart_details]);
    }
}
