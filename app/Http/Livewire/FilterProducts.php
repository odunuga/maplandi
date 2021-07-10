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

    public function mount($title, $filters)
    {
        $this->title = $title;
    }

    public function render()
    {        $products = filtered_products($this->filters, $this->paginate);

        return view('livewire.filter-products', ['products' => $products]);
    }
}
