<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination;

    public $paginate = 9;
    public $title;
    public $filters;

    protected $listeners = ['newSearch' => 'setNewTitle'];

    public function mount($title, $filters)
    {
        $this->title = $title;
    }

    public function render()
    {
        $products = filtered_products($this->filters, $this->paginate);
        return view('livewire.filter-products', ['products' => $products]);
    }

    public function setNewTitle($data)
    {
        if (isset($data['title'])) $this->title = $data['title'];
        if (isset($data['filters'])) $this->filters = $data['filters'];
    }
}
