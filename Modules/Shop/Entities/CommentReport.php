<?php

namespace Modules\Shop\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function format_comment_report()
    {
        $comment_by = isset($this->comment->comment_by) ? $this->comment->comment_by : '';
        $comment = isset($this->comment) ? $this->comment->body : '';
        $reporter = isset($this->reporter) ? $this->reporter->name : '';
        return [
            'id' => $this->id,
            'reporter' => $reporter,
            'commenter' => $comment_by,
            'comment' => $comment,
            'date' => $this->created_at->format('h:m a, d M Y'),
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CommentReportFactory::new();
    }
}
