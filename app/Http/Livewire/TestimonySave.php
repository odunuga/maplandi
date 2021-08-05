<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Admin\Entities\Testimony;
use Modules\Admin\Entities\TestimonyRequest;

class TestimonySave extends Component
{

    public $user_id;
    public $token;
    public $testimony;

    public function testimony_save()
    {
        $test = new Testimony();
        $test->user_id = $this->user_id;
        $test->body = $this->testimony;
        $test->publish = 0;
        $test->save();
        TestimonyRequest::where('token', $this->token)->delete();
        session()->flash('success', 'Thank you for your Time');
        return $this->redirect(url('/'));

    }

    public function render()
    {
        return view('livewire.testimony-save');
    }
}
