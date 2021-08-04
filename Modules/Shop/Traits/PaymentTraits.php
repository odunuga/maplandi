<?php


namespace Modules\Shop\Traits;


use Modules\Cart\Entities\ShippingAddress;

trait PaymentTraits
{

    private function update_shipping_address($data)
    {
        if (isset(auth()->user()->shipping_address)) {
            $address = ShippingAddress::where('user_id', auth()->id())->first();
        } else {
            $address = new ShippingAddress();
            $address->user_id = auth()->id();
        }

        if ($data['first_name']) $address->first_name = $data['first_name'];
        if ($data['last_name']) $address->last_name = $data['last_name'];
        if ($data['email']) $address->email = $data['email'];
        if ($data['phone']) $address->phone = $data['phone'];
        if ($data['address']) $address->address = $data['address'];
        $address->save();
    }
}
