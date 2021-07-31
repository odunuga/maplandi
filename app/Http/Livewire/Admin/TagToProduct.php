<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\Tag;

class TagToProduct extends Component
{
    public $product;
    public $product_tags;
    public $prev;

    protected $listeners = ['setProductTag' => 'set_product_tag', 'tagUpdate' => 'tag_update'];

    public function set_product_tag($sku)
    {
        $product_check = Product::with(['tags'])->where('sku', $sku);
        if ($product_check->count() > 0) {
            $product = $product_check->first();
            $this->product = $product;
            if ($product->tags) {
                $tag = $product->tags->pluck('id')->toArray();
                $this->product_tags = $tag;
                $to_set = $product->tags->pluck('title')->toArray();
                $this->prev = $to_set;
            }
        } else {
            $this->emit('alert', ['error', __('texts.error_fetching')]);
        }
    }

    public function tag_update($tags)
    {
        $this->product_tags = $tags;
    }

    public function add_tag()
    {
        $this->product->tags()->attach($this->product_tags);
        $this->reset();
        $this->emit('alert', ['success', __('texts.product_tag')]);
        $this->emit('close_product_tag');
    }

    public function render()
    {
        $tags = Tag::all();
        return view('livewire.admin.tag-to-product', ['tags' => $tags]);
    }
}
