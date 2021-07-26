<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Modules\Cart\Entities\ShippingAddress;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    public $countries;

    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'phone' => ['nullable', 'min:7'],
            'address' => ['nullable', 'min:7'],
            'country_code' => ['nullable', 'max:4'],
            'shipping_first_name' => ['nullable', 'string'],
            'shipping_phone' => ['nullable', 'min:7'],
            'shipping_address' => ['nullable', 'min:7'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if (isset($input['phone'])) $user->phone = custom_filter_var($input['phone'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($input['address'])) $user->address = custom_filter_var($input['address']);

        if (isset($input['country_code'])) $user->country_code = (string)$input['country_code'];

        if (isset($input['state'])) $user->state = custom_filter_var($input['state']);


        $address = [];
        if (isset($input['shipping_first_name'])) {
            $address['first_name'] = $input['shipping_first_name'];
        }
        if (isset($input['shipping_last_name'])) {
            $address['last_name'] = $input['shipping_last_name'];
        }
        if (isset($input['shipping_email'])) {
            $address['email'] = $input['shipping_email'];
        }

        if (isset($input['shipping_phone'])) {
            $address['phone'] =  custom_filter_var($input['shipping_phone'], FILTER_SANITIZE_NUMBER_INT);
        }
        if (isset($input['address'])) {
            $address['address'] = $input['shipping_address'];
        }
        if (count($address) > 0) $user->shipping_address()->update($address);
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => custom_filter_var($input['name']),
                'email' => custom_filter_var($input['email']),
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
