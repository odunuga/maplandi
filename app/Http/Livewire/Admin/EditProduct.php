<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Image;
use Modules\Shop\Entities\ManyImage;

class EditProduct extends Component
{

    use WithFileUploads;

    public $image;
    public $uploaded_image;
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
    public $hot;
    public $published;
    public $product_type;
    public $stock;
    public $product;

    protected $rules = [
        'cat' => 'required',
        'title' => 'required',
        'price' => 'required',
        'currency_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,svg,jpg,gif',
        'images' => 'nullable|image|mimes:jpeg,png,svg,jpg,gif',
        'product_type' => 'required'
    ];

    public function mount($product)
    {

        $this->product = $product;
        $this->parameters = $product->parameters;
        $this->params = [];
        $this->cat = $product->category_id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->currency_id = $product->currency_id;
        $this->featured = $product->featured;
        $this->available = $product->available;
        $this->published = $product->published;
        $this->hot = $product->hot;
        $this->product_type = $product->featured;
        $this->stock = $product->stock;
        if (isset($product->image) && $product->image->url) {
            $this->uploaded_image = $product->image_url;
        }
    }

    public function update_product_details()
    {
        $product = $this->product;

        $product->update([
            'category_id' => (int)$this->cat,
            'title' => custom_filter_var($this->title),
            'slug' => Str::slug($this->title),
            'description' => custom_filter_var($this->description),
            'price' => (float)$this->price,
            'currency_id' => (int)$this->currency_id,
            'featured' => $this->featured,
            'available' => $this->available,
            'hot' => $this->hot,
            'published' => $this->published,
            'product_type' => custom_filter_var($this->product_type),
            'stock' => (int)$this->stock
        ]);

        $this->store_parameter($product);

        $this->emit('alert', ['success', __('texts.product_update_success')]);
        $this->reset();
    }

    public function update_images()
    {

        $product = $this->product;


        if (isset($this->image) && $this->image)
            $image = $this->image->store("products");

        if (isset($this->images) && $this->images) {
            $images = [];
            foreach ($this->images as $photo) {
                $images[] = $photo->store('products');
            }
        }
        if (isset($image)) {
            $img = new Image();
            $img->url = 'vendor/images/' . $image;
            $product->image()->save($img);
        }

        if (isset($images) && count($images) > 0) {
            foreach ($images as $single_img) {
                $img = new ManyImage;
                $img->url = 'vendor/images/' . $single_img;
                $product->images()->save($img);
            }
        }
        $this->emit('alert', ['success', __('texts.upload_success')]);
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
        return view('livewire.admin.edit-product');
    }
}
