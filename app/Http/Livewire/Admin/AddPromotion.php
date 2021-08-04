<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Shop\Entities\Image;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\Promotion;

class AddPromotion extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $rate = '';
    public $image;
    public $products = [];
    public $start_date;
    public $end_date;
    public $condition = 0;
    public $continuous = 1;
    public $advert = 1;
    public $type_name = '';
    public $all_products;

    protected $listeners = ['product_update' => 'update_product', 'edit_promo' => 'edit_promotion'];

    public function update_product($products)
    {
        $this->products = collect($this->products)->add($products)->unique()->flatten(1)->all();
    }

    public function add_promotion()
    {
        $check_promotion = Promotion::where('title', "like", "%" . $this->title . "%")->where('condition', $this->condition)->where('rate', $this->rate);
        if ($check_promotion->count() > 0) {
            $promo = $check_promotion->first();
        } else {
            $promo = new Promotion();
        }
        $promo->condition = $this->condition;
        $promo->title = $this->title;
        $promo->description = $this->description;
        $promo->rate = $this->rate;
        $promo->start_date = $this->start_date;
        $promo->end_date = $this->end_date;
        $promo->products = $this->products;
        $promo->continuous = $this->continuous;
        $promo->advert = $this->advert;
        $promo->save();

        if ($this->image) {
            $icon = 'vendor/images/' . $this->image->store('promo');
            $img = new Image();
            $img->url = $icon;
            $promo->image()->save($img);
        }

        session()->flash('success', __('texts.success_promotion'));
        return $this->redirect(route('control.promotions'));

    }

    public function edit_promotion($id)
    {
        $promotion = Promotion::where('id', $id)->first();
        $this->title = $promotion->title;
        $this->description = $promotion->description;
        $this->rate = $promotion->rate;
        $this->image = $promotion->image_url;
        $this->products = $promotion->products;
        $this->start_date = $promotion->start_date;
        $this->end_date = $promotion->end_date;
        $this->condition = $promotion->condition;
        $this->continuous = $promotion->continuous;
        $this->advert = $promotion->advert;

    }

    public function render()
    {
        $this->all_products = Product::select(['id', 'title'])->get();
        $this->emit('selectChanged');
        $this->type_name = ($this->advert == 1 || $this->advert) == true ? 'Advert' : 'Promo';
        return view('livewire.admin.add-promotion');
    }
}
