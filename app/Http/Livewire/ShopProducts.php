<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Shop\Entities\Promotion;

class ShopProducts extends Component
{
//    use WithPagination;


    public $title;
    public $categories;
    public $search;
    public $category;
    public $cat_id;
    public $range;
    public $order_by;
    public $dir;
    protected $queryString = ['search', 'category', 'range', 'order_by', 'dir'];
    protected $listeners = ['newRange' => 'filterRange'];


    public function mount()
    {
        $this->filterCategory($this->category);
    }

    // Called directly from click event
    public function filterCategory($slug = null)
    {
        if ($slug === '*') {
            $this->category = '';
        } else {
            $cat = get_category_from_slug($slug);
            if ($cat) {
                $this->category = $cat->slug;
                $this->cat_id = $cat->id;
            }
        }

    }

    public function render()
    {
        $this->search = custom_filter_var($this->search);
        $this->setTitle();
        $this->categories = get_categories(); // fetch all categories for sidebar
        $params = ['category' => $this->category, 'search' => $this->search, 'range' => $this->range, 'order_by' => $this->order_by, 'dir' => $this->dir, 'category_id' => $this->cat_id];

        $advert = $this->get_advert();
        return view('livewire.shop-products', ['title' => $this->title, 'params' => $params, 'advert' => $advert]);
    }


    public function submitSearch()
    {
        $input = custom_filter_var($this->search);
        $this->search = $input;
        $this->emit('newSearch', $input);
    }

    protected function setTitle()
    {
        if ($this->search) {
            $this->title = ucfirst($this->search);
        } else if ($this->category) {
            $this->title = ucfirst($this->category);
        } else {
            $this->title = 'Accessories | Computing | Gadgets | Phones and a whole lot more.';
        }

    }

    private function get_advert()
    {
        $now = now();
        return $advert = Promotion::where('advert', 1)->whereDate('start_date', '<', $now)->whereDate('end_date', '>', $now)->orWhere('continuous', 1)->first();
    }


}
