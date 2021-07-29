<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Comment;

class ProductComment extends Component
{
    private $comments;
    public $name;
    public $email;
    public $comment;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'comment' => 'required'
    ];


    public function mount($comments)
    {
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.product-comment', ['comments' => $this->comments]);
    }

    public function sendNewComment()
    {
        if (!auth()->check()) {
            return abort(403, 'Login Required'); // or you can return the user to the login page
        }
        $comment = new Comment();
        $comment->comment_by_id = auth()->id();
        $comment->name = $this->name;
        $comment->email = $this->email;
        $comment->body = custom_filter_var($this->comment);
        $comment->save();

        $this->emit('alert', ['success', 'Message sent successfully']);
        $this->reset();
    }

}
