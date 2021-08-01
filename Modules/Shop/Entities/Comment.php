<?php

namespace Modules\Shop\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int|mixed|string|null comment_by_id
 * @property int|mixed|string|null product_id
 * @property mixed body
 * @property mixed name
 * @property mixed email
 */
class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comment_by()
    {
        return $this->belongsTo(User::class, 'comment_by_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function format_admin_comments()
    {
        return [
            'id' => $this->id,
            'commenter' => isset($this->comment_by) ? $this->comment_by->name : '',
            'comment' => $this->comment,
            'date' => $this->created_at->format('h:m a, d M Y')
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CommentFactory::new();
    }
}
