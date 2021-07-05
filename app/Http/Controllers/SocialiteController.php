<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //
    public function login()
    {
        return Socialite::driver('google')->with(['type' => 'login'])->redirect();
    }

    public function signup()
    {
        return Socialite::driver('google')->with(['type' => 'register'])->redirect();
    }


    public function webhook()
    {

        $userSocial = Socialite::driver('google')->user();

        // OAuth 2.0 providers...
//        $token = $user->token;
//        $refreshToken = $user->refreshToken;
//        $expiresIn = $user->expiresIn;


        // All providers...
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();
        $check_user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($check_user) {
            Auth::login($check_user);
            return $this->redirectUser();
        } else {
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'profile_photo_path' => $userSocial->getAvatar(),
                'password' => Hash::make($userSocial->getId()),
                'socialite_id' => $userSocial->getId()
            ]);

            Auth::login($user);
            return $this->redirectUser();
        }
    }

    private function redirectUser()
    {
        $check_session = Session::has('redirect_to');
        if ($check_session) {
            $to = Session::get('redirect_to');
        } else {
            $to = route('dashboard');
        }
        return redirect($to);
    }
}
