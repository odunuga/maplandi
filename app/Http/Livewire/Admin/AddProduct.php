<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Image;
use Modules\Shop\Entities\ParameterBuilder;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductParameter;

class AddProduct extends Component
{
    use WithFileUploads;

    public $sku;
    public $product_id;
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


    public function mount(Product $product)
    {
        $this->product_id = $product->id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->sku = $product->sku;
        $this->price = $product->price;
        $this->product_type = $product->product_type;
        $this->stock = $product->stock;
        $this->currency_id = $product->currency_id;
        $this->featured = $product->featured;
        $this->available = $product->available;
        $this->published = $product->published;
        $this->cat = $product->category_id;
    }

    public function add_product()
    {
        $image = $this->image->store("products");

        $images = [];
        foreach ($this->images as $photo) {
            $images[] = $photo->store('products');
        }

        $check = Product::where('id', $this->product_id)->where('sku', $this->sku);
        if ($check->count() > 0) {

            $product = $check->first()->update([
                'category_id' => (int)$this->cat,
                'title' => custom_filter_var($this->title),
                'slug' => Str::slug($this->title),
                'description' => custom_filter_var($this->description),
                'price' => (float)$this->price,
                'currency_id' => (int)$this->currency_id,
                'featured' => $this->featured,
                'available' => $this->available,
                'published' => $this->published,
                'product_type' => custom_filter_var($this->product_type),
                'stock' => (int)$this->stock
            ]);
            $img = new Image();
            $img->url = 'vendor/images/' . $image;
            $product->image()->save($img);
            if ($images && count($images) > 0) {
                foreach ($images as $single_img) {
                    $img = new Image();
                    $img->url = 'vendor/images/' . $single_img;
                    $product->images()->save($img);
                }
            }
            $this->store_parameter($product);

        }
        $this->reset();
        $this->emit('alert', ['success', 'Product Added Successfully']);
    }

    private function store_parameter($product)
    {

        if ($this->params && count($this->params) > 0)
            foreach ($this->params as $k => $v) {

                $parameters = \Modules\Shop\Entities\Parameter::where('category_id', $this->cat)->where('title', $k)->first();

                $product->parameters()->save($parameters);
                $product->parameters()->updateExistingPivot($parameters->id, array('value' => $v), false);

            }
    }


    public
    function selected_category()
    {
        $category = (int)$this->cat;
        $parameters = \Modules\Shop\Entities\Parameter::with(['properties'])->where('category_id', $category)->get();
        $this->parameters = $parameters;
    }


    public
    function render()
    {
        $this->categories = \Modules\Shop\Entities\Category::all();
        $this->currencies = Currency::all();
        return view('livewire.admin.add-product');
    }
}
