<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Currency;

class Navbar extends Component
{

    public $counter;
    public $currency_id;
    protected $listeners = ['set_new_currency'];

    public function mount()
    {

    }

    public function render()
    {
        $currencies = Currency::all();
        return view('livewire.navbar', ['currencies' => $currencies]);
    }

    public function set_new_currency()
    {
        $currency = $this->get_currency_using_id($this->currency_id);
        set_user_currency($currency['id'], $currency['code']);
    }

    private function get_currency_using_id($id)
    {
        return Currency::where('id', $id)->first();
    }
}
