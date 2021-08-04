<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Admin\Entities\Testimony;

class EditTestimony extends Component
{
    public $body;
    public $publish = true;
    public $testimony;
    protected $listeners = ['editTestimony' => 'edit_testimony'];


    public function edit_testimony($data)
    {
        $id = $data['id'];
        $fetch = Testimony::where('id', $id);
        if ($fetch->count() > 0) {
            $test = $fetch->first();
            $this->body = $test->body;
            $this->testimony = $test;
        } else {
            $this->emit('alert', ['error', __('texts.testimony_not_found')]);
        }
    }

    public function submit_testimony()
    {
        if ($this->body) {
            if (isset($this->testimony)) {
                $this->testimony->body = $this->body;
                $this->testimony->publish = $this->publish;
                $this->testimony->save();
                session()->flash('success', __('texts.testimony_updated'));
                return redirect(route('control.testimonies'));
            } else {

                $this->emit('alert', ['error', __('texts.error_fetching_testimony')]);
            }
        } else {
            $this->emit('alert', ['error', __('texts.empty_testimony_body')]);
        }
    }

    public function render()
    {
        return view('livewire.admin.edit-testimony');
    }
}
