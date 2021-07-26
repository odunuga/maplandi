<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;

class Latest extends Component
{
    public $latest_products  ;
    public $random_products  ;
    public $popular_products ;

    public function mount()
    {

    }


    public function render()
    {
        return view('livewire.latest');
    }
}
