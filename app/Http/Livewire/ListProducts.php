<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListProducts extends Component
{
    public $item;

    public function mount($item): void
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.list-products');
    }
}
