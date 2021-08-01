<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Comment;

class ProductComment extends Component
{
    public $product_id;
    public $name;
    public $email;
    public $comment;
    public $edit_id;

    protected $listeners = ['editComment' => 'edit_comment'];
    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'comments' => 'required'
    ];

    public function edit_comment($comment)
    {
        $this->comment = $comment['body'];
        $this->name = $comment['name'];
        $this->email = $comment['email'];
        $this->edit_id = $comment['id'];
    }

    public function mount()
    {
//        $this->comments = $comments;
        $this->name = auth()->check() ? auth()->user()->name : '';
        $this->email = auth()->check() ? auth()->user()->email : '';
    }

    public function render()
    {
        return view('livewire.product-comment');
    }

    public function sendNewComment()
    {
        if (!auth()->check()) {
            return abort(403, 'Login Required'); // or you can return the user to the login page
        }
        if ($this->edit_id) {
            $comment = Comment::where('id', $this->edit_id)->first();
        } else {
            $comment = new Comment();
            $comment->product_id = $this->product_id;
            $comment->comment_by_id = auth()->id();

        }
        $comment->name = $this->name;
        $comment->email = $this->email;
        $comment->body = custom_filter_var($this->comment);
        $comment->save();

        $this->comment = '';
        $this->emit('new_comment');
        $this->emit('alert', ['success', 'Message sent successfully']);

    }

}
