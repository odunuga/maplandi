<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $subject;
    public $phone;
    public $message;


    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'message' => 'required'
    ];

    public function render()
    {
        if(auth()->check()){
            $this->name = auth()->user()->name;
            $this->phone = auth()->user()->phone;

        }
        return view('livewire.contact-us');
    }

    public function submit()
    {
        $this->validate();
        $this->sendMail();
        $this->reset();
        $this->emit('alert', ['success', 'Message sent successfully']);

    }

    private function sendMail()
    {
        // Send Mail Here
        $mail = collect([
            'name' => $this->name,
            'subject' => $this->subject,
            'phone' => $this->phone,
            'message' => $this->message
        ]);
        $admin = env('MAIL_FROM_ADDRESS');
        Notification::route('mail', $admin)->notify(new \App\Notifications\ContactUs($mail));
    }


}
