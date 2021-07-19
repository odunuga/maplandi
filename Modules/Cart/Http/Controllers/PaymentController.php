<?php

namespace Modules\Cart\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Cart\Entities\Order;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

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
                'address' => ['required', 'min:10']
            ]);

            if ($validate->fails()) {
                return Paystack::getAuthorizationUrl()->redirectNow();
            } else {
                return back()->with($validate->errors())->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['alert' => ['error', 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']]);
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

            $order->user_id = auth()->id();
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
            $order->first_name = $address['first_name'];
            $order->last_name = $address['last_name'];
            $order->email = $address['email'];
            $order->phone = $address['phone'];
            $order->address = $address['address'];
            $order->fees = $paymentDetails['data']['fees'];
            $order->customer_code = $paymentDetails['data']['customer']['customer_code'];
            $order->transaction_confirmed = $paymentDetails['data']['status'] === "success";
            $order->save();

            //TODO Emit Payment Event Information


        } else {
            $order = Order::where('reference', $paymentDetails['data']['reference'])->first();
        }

        return view('cart::payment')->with(compact('order'));
    }
}
