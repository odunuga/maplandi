<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\Notification;
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
        Notification::route('mail', [
            env('MAIL_FROM_ADDRESS') => 'Admin'
        ])->notify(new \App\Notifications\ContactUs($mail));
    }


}
