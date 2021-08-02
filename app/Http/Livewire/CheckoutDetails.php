<?php

namespace App\Http\Livewire;

use App\Notifications\CheckoutProcessed;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Cart\Entities\Order;
use Modules\Shop\Traits\CartTraits;
use Unicodeveloper\Paystack\Facades\Paystack;

class CheckoutDetails extends Component
{
    use CartTraits;

    public $cart_details;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $total_in_kobo;
    public $conditions;

    protected $rules = [
        'first_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => ['required', 'min:8']
    ];

    public function mount()
    {
        $this->init();
        $this->first_name = auth()->user()->shipping_address ? auth()->user()->shipping_address->first_name : auth()->user()->name;
        $this->last_name = auth()->user()->shipping_address ? auth()->user()->shipping_address->last_name : auth()->user()->name;
        $this->email = auth()->user()->shipping_address ? auth()->user()->shipping_address->email : auth()->user()->email;
        $this->phone = auth()->user()->shipping_address ? auth()->user()->shipping_address->phone : auth()->user()->phone;
        $this->address = auth()->user()->shipping_address ? auth()->user()->shipping_address->address : '';
        if ($this->cart_details && isset($this->cart_details['cart']) && $this->cart_details['cart'] !== [] && count($this->cart_details['cart']) > 0) {
            return view('livewire.checkout-details', ['cart_details' => $this->cart_details]);
        }

        session()->flash('error', 'Invalid data provided');
        return redirect('cart');
    }

    public function init()
    {
        if (auth()->check() != true) {
            redirect()->route('login');
        }
        // get the current session cart in db
        $cart_check = $this->get_session_cart($this->session_id());
        if ($cart_check->count() > 0) {
            $cart_details = $cart_check->first();
            // get previous cart session in db
        } else {
            $check_cart = $this->fetch_cart();
            if ($check_cart && $cart_check->count() < 1) {
                \Cart::session($this->session_id())->add($check_cart->cart);
                $cart_details = $this->move_previous_session_cart($check_cart->session_id);
            } else {
                // store current cart in db and fetch it
                $cart_items = $this->get_all_items();
                $cart_details = $this->store_cart_in_db($this->session_id(), $cart_items, get_user_currency()['id'], get_user_currency()['code']);
            }
        }
        $this->cart_details = collect($cart_details);
        clear_redirect_for_prev_session();

    }

    public function cal_total_in_kobo()
    {
        $total = (double)isset($this->cart_details['total']) ? $this->cart_details['total'] : 0;
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
            "currency" => $this->cart_details['payment_currency'],
            "metadata" => json_encode(['cart' => $this->cart_details['cart'], 'address' => ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'phone' => $this->phone, 'address' => $this->address, 'conditions' => $this->get_cart_conditions()]]),
            "reference" => Paystack::genTranxRef()
        ];
//        return \Redirect::route('pay')->with($payment_data);
    }

    public function pay_on_delivery_order_confirmation()
    {
        // prepare order with details and send to order table
        $store_transaction = $this->save_on_delivery_order();
        if ($store_transaction) {
            return redirect()->route('payment.on_delivery');
        }
    }

    public function render()
    {
        $this->cal_total_in_kobo();
        $conditions = $this->get_cart_conditions();
        $this->conditions = $this->get_condition_names($conditions);
        return view('livewire.checkout-details', ['cart_details' => $this->cart_details]);


    }


    private function generate_on_delivery_id()
    {
        return 'POD' . Str::random(4) . auth()->id() . time() . $this->cart_details['id'];
    }

    private function save_on_delivery_order()
    {
        $this->validate();
        $cart_conditions = $this->get_cart_conditions();
        if ($this->cart_details['cart']) {

            $transaction_id = $this->generate_on_delivery_id();
            $order = new Order();
            $order->payment_type = 'pay_on_delivery';
            $order->user_id = auth()->id();
            $order->status = 'pending';
            $order->message = 'on_delivery';
            $order->cart_id = $this->cart_details['id'];
            $order->transaction_id = $transaction_id;
            $order->reference = $transaction_id;
            $order->amount = $this->cart_details['total'];
            $order->payment_message = null;
            $order->gateway_response = null;
            $order->paid_at = null;
            $order->channel = 'on_delivery';
            $order->currency = (int)$this->cart_details['payment_currency'];
            $order->cart = $this->cart_details['cart'];
            $order->sub_total = $this->cart_details['sub_total'];
            $order->tax_added = $this->cart_details['tax_added'];
            $order->first_name = $this->first_name;
            $order->last_name = $this->last_name;
            $order->email = $this->email;
            $order->phone = $this->phone;
            $order->address = $this->address;
            $order->conditions = $this->get_condition_names($cart_conditions);
            $order->fees = null;
            $order->customer_code = null;
            $order->transaction_confirmed = false;

            $this->clear_all_cart($this->session_id());
            $this->clear_session_cart($this->session_id());
            $order->save();
            auth()->user()->notify(new CheckoutProcessed($order->load('payment_currency')));
            return $order;
        }
        return redirect(route('cart'));

    }
}
