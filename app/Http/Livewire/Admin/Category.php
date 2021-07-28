<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Category extends Component
{
    public $category;
    public $to_delete = false;

    public function confirm_delete()
    {
        $this->to_delete = true;
    }

    public function delete_category()
    {
        $this->category->delete();
        $this->redirect(route('control.items'));
    }

    public function render()
    {
        return view('livewire.admin.category');
    }
}
