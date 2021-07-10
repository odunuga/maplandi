<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Shop\Entities\Product;

class ShopProducts extends Component
{
    use WithPagination;


    public $title;
    public $filters;


    public function render()
    {
        $this->title = 'Accessories | Computing | Gadgets | Phones and a whole lot more.';

        return view('livewire.shop-products');
    }

}
