<?php

namespace Modules\Cart\Http\Controllers;


use App\Notifications\CheckoutProcessed;
use App\Notifications\InvoicePaid;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Traits\AdminTraits;
use Modules\Cart\Entities\Order;
use Modules\Shop\Traits\CartTraits;
use Modules\Shop\Traits\PaymentTraits;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    use PaymentTraits;
    use CartTraits, AdminTraits;

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {

        try {
            $validate = Validator::make(request()->all(), [
                'first_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => ['required', 'min:5']
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate);
            }

            $this->update_shipping_address(request()->all());
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return redirect()->back()->with(['alert' => ['error', $e->getMessage()]]);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if (Order::where('reference', $paymentDetails['data']['reference'])->count() < 1) {

            $address = $paymentDetails['data']['metadata']['address'];
            $order = new Order();
            $order->payment_type = 'pay_now'; //'pay_now', 'pay_on_delivery'
            $order->user_id = auth()->id();
            $order->cart_id = $paymentDetails['data']['order_id'];
            $order->status = $paymentDetails['status'];
            $order->message = $paymentDetails['message'];
            $order->cart_id = $paymentDetails['data']['order_id'];
            $order->transaction_id = $paymentDetails['data']['id'];
            $order->reference = $paymentDetails['data']['reference'];
            $order->amount = $paymentDetails['data']['amount'];
            $order->payment_message = $paymentDetails['data']['message'];
            $order->gateway_response = $paymentDetails['data']['gateway_response'];
            $order->paid_at = $paymentDetails['data']['paid_at'];
            $order->channel = $paymentDetails['data']['channel'];
            $order->currency = $paymentDetails['data']['currency'];
            $order->cart = $paymentDetails['data']['metadata']['cart'];
            $order->sub_total = $paymentDetails['data']['metadata']['sub_total'];
            $order->tax_added = $paymentDetails['data']['metadata']['tax_added'];
            $order->first_name = $address['first_name'];
            $order->last_name = $address['last_name'];
            $order->email = $address['email'];
            $order->phone = $address['phone'];
            $order->address = $address['address'];
            $order->conditions = $paymentDetails['data']['metadata']['conditions'];
            $order->fees = $paymentDetails['data']['fees'];
            $order->customer_code = $paymentDetails['data']['customer']['customer_code'];
            $order->transaction_confirmed = $paymentDetails['data']['status'] === "success";

            $order->save();

            //TODO Emit Payment Event Information
            auth()->user()->notify(new CheckoutProcessed($order->load('payment_currency')));
            auth()->user()->notify(new InvoicePaid($order));
            $this->notifyAdmin($order->load('payment_currency'));
            $this->clear_session_cart($this->session_id());

        } else {
            $order = Order::where('reference', $paymentDetails['data']['reference'])->first();
        }
        $this->clear_all_cart($this->session_id());

        return view('cart::payment_confirmation')->with(compact('order'));
    }


}
