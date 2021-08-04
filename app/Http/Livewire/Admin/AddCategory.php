<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Shop\Entities\Image;

class AddCategory extends Component
{

    use WithFileUploads;

    public $name;
    public $category_id = null;
    public $icon;

    public function add_category()
    {
        $category = $this->name;

        if ($category) {
            $slug = Str::slug($category);
            $tooltip = 'Information about ' . $category;
            $category_id = $this->category_id ? $this->category_id : null;
            $check = \Modules\Shop\Entities\Category::where('title', 'LIKE', '%' . $this->name . '%');
            if ($check->count() > 0) {
                $cat = $check->first();
                $cat->forceFill([
                    'title' => $category,
                    'slug' => $slug,
                    'tooltip' => $tooltip
                ]);
            } else {
                $cat = \Modules\Shop\Entities\Category::create([
                    'category_id' => $category_id,
                    'title' => $category,
                    'slug' => $slug,
                    'tooltip' => $tooltip
                ]);

            }

            if ($this->icon)
                $icon = 'vendor/images/' . $this->icon->store('category');

            if (isset($icon)) {
                $img = new Image();
                $img->url = $icon;
                $cat->image()->save($img);
            }

            $cat->save();

            $this->category = '';
            $this->emit('alert', ['success', 'Category Created']);
            $this->redirect(route('control.items'));
        } else {
            $this->emit('alert', ['error', 'couldn\'t set category']);

        }
    }

    public function render()
    {
        $all_cats = \Modules\Shop\Entities\Category::where('category_id', null)->get();
        return view('livewire.admin.add-category', ['categories' => $all_cats]);
    }
}
