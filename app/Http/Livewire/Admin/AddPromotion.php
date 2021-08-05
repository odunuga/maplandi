<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
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
    public $prev_img;
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
        $start_date = !empty($this->start_date) ? Carbon::create($this->start_date) : null;
        $end_date = !empty($this->end_date) ? Carbon::create($this->end_date) : null;

        $check_promotion = Promotion::where('title', "like", "%" . $this->title . "%")->where('condition', $this->condition)->where('advert', $this->advert)->where('start_date', $start_date);
        if ($check_promotion->count() > 0) {
            $promo = $check_promotion->first();
        } else {
            $promo = new Promotion();
        }
        $check_rate = $this->rate;
        if (substr($check_rate, 1, 1) !== '-' || substr($check_rate, 1, 1) !== '+') {
            $rate = '-' . $check_rate;
        } else {
            $rate = $check_rate;
        }
        $promo->condition = $this->condition;
        $promo->title = $this->title;
        $promo->description = $this->description;
        $promo->rate = $this->rate;
        $promo->start_date = $start_date;
        $promo->end_date = $end_date;
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
        $this->prev_img = $promotion->image_url;
        $this->products = $promotion->products;
        $this->start_date = !empty($promotion->start_date) ? $promotion->start_date->format('Y-m-d\TH:i:s') : null;
        $this->end_date = !empty($promotion->end_date) ? $promotion->end_date->format('Y-m-d\TH:i:s') : null;
        $this->condition = ($promotion->condition === true || $promotion->condition === 1) ? 1 : 0;
        $this->continuous = ($promotion->continuous === true || $promotion->continuous === 1) ? 1 : 0;
        $this->advert = ($promotion->advert === true || $promotion->advert === 1) ? 1 : 0;

    }

    public function render()
    {
        $this->all_products = Product::select(['id', 'title'])->get();
        $this->emit('selectChanged');
        $this->type_name = ($this->advert == 1 || $this->advert) == true ? 'Advert' : 'Promo';
        return view('livewire.admin.add-promotion');
    }
}
