<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ShopProducts extends Component
{
    use WithPagination;


    public $title;
    public $filters;
    public $categories;
    protected $listeners = ['newRange' => 'SetNewRange'];

    public function mount()
    {
        $this->categories = get_categories();
        Cache::forget('filters');
    }

    public function filterCategory($slug)
    {
        $this->build_link('category', $slug);
        $cat = get_category_from_slug($slug);
        $data = ['filters' => $this->filters, 'title' => $cat->title];
        $this->emitData($data);
    }

    public function SetNewRange($value)
    {
        $this->build_link('range', $value);
        $data = ['filters' => $this->filters];
        $this->emitData($data);
    }

    private function emitData($data)
    {
        $this->emit('newSearch', $data);
    }

    public function render()
    {
        $this->title = 'Accessories | Computing | Gadgets | Phones and a whole lot more.';

        return view('livewire.shop-products');
    }

    public function build_link($name, $slug)
    {
        if (Cache('filters')) {
            $fetches = collect(Cache('filters'));

        } else {
            // fetch current filters and add new filter option for categories
            $fetches = collect($this->filters);
        }
        $fetches = $fetches->put($name, $slug);
        Cache(['filters' => $fetches]);
        $this->filters = $fetches;

    }

}
