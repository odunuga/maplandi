<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Shop\Entities\ParameterBuilder;

class BuildParameter extends Component
{
    public $parameter;
    public $category;
    public $parameter_id;
    public $input_type = ['input', 'textarea', 'select', 'radio', 'check'];
    public $new_name = '';
    public $new_id = '';
    public $attributes = [];
    public $new_type;
    public $single_data;
    public $class = 'form-control';

    public function mount($category)
    {
        $this->category = $category;
    }

    protected $listeners = ['BuildApp' => 'prepareBuild'];

    public function prepareBuild($data)
    {
        $this->parameter = $data;
        $this->parameter_id = $data['id'];
        $this->new_name = isset($data['properties']['type_name']) ? $data['properties']['type_name'] : $data['title'];
        if (isset($data['properties']['type_id'])) $this->new_id = $data['properties']['type_id'];
        if (isset($data['properties']['type'])) $this->new_type = $data['properties']['type'];
        if (isset($data['properties']['class'])) $this->class = $data['properties']['class'];
        if (isset($data['properties']['attributes'])) $this->attributes = $data['properties']['attributes'];
    }

    public function add_data()
    {
        $this->attributes[] = $this->single_data;
        $this->single_data = '';
        $this->save_updates();
        $this->render();
    }

    public function build_properties()
    {
        $this->save_updates();
        $this->emit('alert', ['success', 'Updated']);

        $this->redirect(url('/control-room/builder/' . $this->category->id));
    }

    private function save_updates()
    {
        $type_name = isset($this->new_name) ? $this->new_name : '';
        if (isset($this->parameter)) {
            $check = ParameterBuilder::where('parameter_id', $this->parameter_id);
        } else {
            $check = collect([]);
        }

        if ($check->count() > 0) {
            $prop = $check->first();
        } else {
            $prop = new ParameterBuilder();
            $prop->parameter_id = $this->parameter_id;
        }
        $prop->type_id = $this->new_id ? $this->new_id : strtolower($type_name);

        $prop->type_name = $this->new_name;
        $prop->type = strtolower($this->new_type);
        $prop->class = $this->class;
        $prop->attributes = $this->attributes;
        $prop->save();
    }

    public function render()
    {
        return view('livewire.admin.build-parameter');
    }
}
