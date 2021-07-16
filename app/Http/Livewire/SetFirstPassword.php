<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SetFirstPassword extends Component
{
    public $password;
    public $password_confirmation;


    protected $rules = [
        'password' => ['required', 'confirmed'],
    ];

    public function setNewPassword()
    {
        $check_session = session()->has('redirect_to');
        auth()->user()->password = Hash::make($this->password);
        $to = 'dashboard';
        if ($check_session) {
            $to = session()->get('redirect_to');
        }
        return redirect()->route($to);
    }


    public function render()
    {
        return view('livewire.set-first-password');
    }
}
