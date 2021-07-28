<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Shop\Entities\Currency;

class EditProduct extends Component
{

    use WithFileUploads;

    public $image;
    public $images;
    public $categories;
    public $parameters;
    public $params = [];
    public $cat;
    public $title;
    public $description;
    public $price;
    public $currency_id;
    public $currencies;
    public $featured;
    public $available;
    public $published;
    public $product_type;
    public $stock;


    protected $rules = [
        'cat' => 'required',
        'title' => 'required',
        'price' => 'required',
        'currency_id' => 'required',
        'image' => 'required|image|mimes:jpeg,png,svg,jpg,gif',
        'images' => 'nullable|image|mimes:jpeg,png,svg,jpg,gif',
        'product_type' => 'required'
    ];


    public function update_product_details()
    {
        dd('here');
    }

    public
    function selected_category()
    {
        $category = (int)$this->cat;
        $parameters = \Modules\Shop\Entities\Parameter::with(['properties'])->where('category_id', $category)->get();
        $this->parameters = $parameters;
    }
    public function render()
    {
        $this->categories = \Modules\Shop\Entities\Category::all();
        $this->currencies = Currency::all();
        return view('livewire.admin.edit-product');
    }
}
