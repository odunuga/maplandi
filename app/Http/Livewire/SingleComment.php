<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\CommentReport;

class SingleComment extends Component
{
    public $comment;


    public function edit()
    {
        $this->emit('editComment', $this->comment);
    }

    public function delete()
    {
        $this->emit('delete_comment', $this->comment);
    }

    public function report()
    {
        $this->emit('report_comment', $this->comment);
    }

    public function render()
    {
        return view('livewire.single-comment');
    }
}
