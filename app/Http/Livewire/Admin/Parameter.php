<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Parameter extends Component
{

    public $parameter;
    public $to_delete = false;
    public $cat_id;

    public function confirm_delete()
    {
        $this->to_delete = true;
    }

    public function make_build($id)
    {
    }

    public function delete_category()
    {
        $this->parameter->delete();
        $this->redirect(url('control-room/builder/' . $this->cat_id));
    }

    public function render()
    {
        return view('livewire.admin.parameter');
    }
}
