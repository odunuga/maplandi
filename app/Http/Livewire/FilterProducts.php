<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination;

    public $paginate = 9;
    public $title;
    public $search;
    public $category;
    public $cat_id;
    public $range;
    public $order = 'created_at';
    public $dir = 'desc';

    protected $listeners = ['newSearch' => 'prepSearch'];

    public function mount($title, $params)
    {
        $this->title = $title;
        $search = $params['search'];
        $category = $params['category'];
        $range = $params['range'];
        $order_by = $params['order_by'];
        $dir = $params['dir'];
        $cat_id = $params['category_id'];
        if ($category) $this->category = $category;
        if ($search) $this->search = $search;
        if ($cat_id) $this->cat_id = $cat_id;
        if ($range) $this->range = $range;
        if ($order_by) $this->order = $order_by;
        if ($dir) $this->dir = $dir;
    }

    public function render()
    {
        $products = filtered_products($this->paginate, $this->cat_id, $this->range, $this->search, $this->order, $this->dir);
        return view('livewire.filter-products', ['products' => $products]);
    }


    public function prepSearch($query)
    {
        $this->title = $query;
        $this->search = $query;
    }
}
