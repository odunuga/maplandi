<?php


namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Cache;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $to = RouteServiceProvider::HOME;
        $check_session = Cache::has('redirect_to'); // check if redirect page is set
        if ($check_session) {
            $to = Cache::get('redirect_to'); // take user to redirect page
        }

        return redirect()->intended($to);
    }
}
