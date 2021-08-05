<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //
    public function login()
    {
        return Socialite::driver('google')->with(['type' => 'login'])->redirect(); // redirect to google login
    }

    public function signup()
    {
        return Socialite::driver('google')->with(['type' => 'register'])->redirect(); // redirect to google signup
    }


    public function webhook()
    {

        $userSocial = Socialite::driver('google')->user(); // fetch user details from google

        $check_user = User::where('email', $userSocial->getEmail())->first();  // check if we have user details in our db
        if ($check_user) {
            if ($check_user->email_verified_at === null) {
                $check_user->email_verified_at = now()->toDateTime();
                $check_user->update();
                DB::table('password_resets')->insert([
                    'email' => $check_user->email,
                    'token' => $userSocial->accessTokenResponseBody['access_token'],
                    'created_at' => Carbon::now()
                ]);
            }
            Auth::login($check_user); // login the user
            // check if user has not changed default password
            if (Hash::check($userSocial->getId(), $check_user->password)) {
                // take user to page to change default password
                return redirect()->route('password.first')->with(['user' => $check_user]);
            }
            return $this->redirectUser(); // redirect user back to page before user login
        } else {
            // create new user
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'password' => Hash::make($userSocial->getId()),
                'socialite_id' => $userSocial->getId(),
                'email_verified_at' => now()->toDateTime()
            ]);
            $user->profile_photo_path = $userSocial->getAvatar();
            $user->update();
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $userSocial->accessTokenResponseBody['access_token'],
                'created_at' => Carbon::now()
            ]);
            Auth::login($user); // login new user
            return redirect()->route('password.first')->with(['user' => $user]); // take user to first password changing page
        }
    }

    private function redirectUser($to = RouteServiceProvider::HOME)
    {
        $check_session = Cache::has('redirect_to'); // check if redirect page is set
        if ($check_session) {
            $to = Cache::get('redirect_to'); // take user to redirect page
        }
        return redirect()->route($to);
    }

    public function password_set()
    {
        if (auth()->check()) {
            $user = auth()->user();
            if (Hash::check($user->socialite_id, $user->password) == true) {

                return view('first_password_set')->with(['user' => $user]);
            }
        }
        return redirect()->route('welcome')->with(['alert' => ['error', 'Authorization failed']]);
    }

}
