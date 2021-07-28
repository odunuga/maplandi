<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AddParameter extends Component
{
    public $name;
    public $category;
    public $parameter_id;
    public $lock;

    public function add_parameter()
    {
        $name = $this->name;
        $para_new = new \Modules\Shop\Entities\Parameter();
        if ($this->parameter_id) {
            $para_id = $this->parameter_id;
            $para = \Modules\Shop\Entities\Parameter::where('id', $para_id)->first();
            $para_new->title = $para->title;

        } else {
            $para_new->title = $name;
        }
        $para_new->category_id = $this->category->id;

        $para_new->save();
        $this->parameter_id = '';
        $this->name = '';
        $this->lock = false;

        $this->emit('alert', ['success', 'New parameter Added']);
        $this->redirect(url('control-room/builder/' . $this->category->id));
    }



    public function render()
    {
        $this->lock = $this->parameter_id != null;
        $prev = isset($this->category->parameters) ? $this->category->parameters->pluck('title')->toArray() : [];
        $paras = \Modules\Shop\Entities\Parameter::whereNotIn('title', $prev)->get();
        return view('livewire.admin.add-parameter', ['parameters' => $paras]);
    }
}
