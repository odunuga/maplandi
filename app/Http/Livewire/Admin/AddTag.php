<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\Tag;

class AddTag extends Component
{

    public $title;
    public $tag_id = null;

    protected $listeners = ['edit_tag' => 'show_edit'];

    public function render()
    {
        return view('livewire.admin.add-tag');
    }

    public function show_edit($tag)
    {
        $this->tag_id = (int)$tag['id'];
        $this->title = $tag['title'];
    }

    public function add_item()
    {
        if ($this->title) {
            if ($this->tag_id !== null) {
                $tag = Tag::where('id', $this->tag_id)->firstOrFail();
                $tag->title = custom_filter_var($this->title);
                $tag->save();

                session()->flash('success', __('texts.tag_updated'));
                $this->redirect(route('control.tags'));
            } else {
                $check_exists = Tag::where('title', 'LIKE', '%' . $this->title . '%');
                if ($check_exists->count() < 1) {
                    $tag = Tag::create([
                        'title' => custom_filter_var($this->title)
                    ]);
                    session()->flash('success', __('texts.tag_created'));
                    return redirect(route('control.tags'));
                } else {

                    $this->emit('alert', ['error', __('texts.duplicate_tag_created')]);
                    return  redirect(route('control.tags'));
                }
            }

        } else {
            $this->emit('alert', ['error', __('texts.empty_tag_title')]);
        }

    }


}
