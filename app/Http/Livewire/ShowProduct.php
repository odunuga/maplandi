<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Shop\Entities\Comment;
use Modules\Shop\Entities\CommentReport;
use Modules\Shop\Entities\Product;

class ShowProduct extends Component
{
    use WithPagination;

    public $product;
    public $delete_comment;


    protected $listeners = ['new_comment' => '$refresh', 'about_to_delete' => 'set_delete_comment'];

    public function mount($product_id)
    {
        $this->product = Product::with(['image', 'comments', 'category', 'tags', 'currency', 'parameters'])->where('id', $product_id)->first();
    }

    public function set_delete_comment($data)
    {
        $this->delete_comment = $data['id'];
    }

    public function render()
    {
        if ($this->product->comments) {
            $all_comments = collect($this->product->comments);

            $comments = $this->paginate($all_comments->sortByDesc('id'), 8, request()->get('page'));
        } else {
            $comments = [];
        }
        return view('livewire.show-product', ['comments' => $comments]);
    }


    public function paginate(Collection $collection, $per_page = null, $current_page = null)
    {
        $offset = $collection->forPage($current_page, $per_page);
        $total = count($collection);
        return new LengthAwarePaginator($offset, $total, $per_page, Paginator::resolveCurrentPage(), ['path' => Paginator::resolveCurrentPath()]);
    }

    public function deleteComment()
    {
        if ($this->delete_comment) {

            $check = Comment::where('id', $this->delete_comment);
            if ($check->count() > 0) {
                $comment = $check->first();
                if ($comment->comment_by_id === auth()->id()) {
                    $this->emit('alert', ['success', __('texts.comment_deleted')]);
                    $this->emit('new_comment');
                    $this->delete_comment = '';
                } else {
                    $this->emit('alert', ['error', __('texts.wrong_comment')]);
                }

            }
        }
        $this->emit('alert', ['error', __('texts.delete_comment_error')]);
        $this->emit('close_delete_modal');
    }

}

