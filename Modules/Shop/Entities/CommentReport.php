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

    public function message()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function format_comment_report()
    {
        $comment_by = isset($this->message->comment_by) ? $this->message->comment_by->name : '';

        $message = isset($this->message) ? $this->message->body : '';
        $reporter = isset($this->reporter) ? $this->reporter->name : '';
        $comments = isset($this->comment) ? $this->comment : '';

        return [
            'id' => $this->id,
            'reporter' => $reporter,
            'reporter_comment' => $comments,
            'comment_id' => $this->comment_id,
            'commenter' => $comment_by,
            'message' => $message,
            'date' => $this->created_at->format('h:ma, d M Y'),
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CommentReportFactory::new();
    }
}
