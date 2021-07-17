<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SetFirstPassword extends Component
{
    public $password;
    public $password_confirmation;


    protected $rules = [
        'password' => 'required|min:6|confirmed'
    ];

    public function setNewPassword()
    {
        $check_session = Cache::has('redirect_to');
        $to = 'dashboard';
        $this->update_user_password(auth()->user(), $this->password);

        if ($check_session) {
            $to = Cache::get('redirect_to');
        }
        return redirect()->route($to);
    }


    public function render()
    {
        return view('livewire.set-first-password');
    }

    private function update_user_password(User $user, $password)
    {
        $user->password = Hash::make($password);
        return $user->save();
    }
}
