<?php

namespace App\Http\Livewire;

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
        $validatedData = $this->validate();

        $this->sendMail();
        $this->reset();
        $this->emit('alert', ['success', 'Message sent successfully']);

    }

    private function sendMail()
    {
        // Send Mail Here

    }


}
