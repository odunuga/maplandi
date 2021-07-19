<?php


namespace Modules\Shop\Traits;


trait PaymentTraits
{

    private function update_shipping_address($data)
    {
        $address = auth()->user()->shipping_address;

        if ($data['first_name']) $address->first_name = $data['first_name'];
        if ($data['last_name']) $address->last_name = $data['last_name'];
        if ($data['email']) $address->email = $data['email'];
        if ($data['phone']) $address->phone = $data['phone'];
        if ($data['address']) $address->address = $data['address'];
        return $address->save();
    }
}
