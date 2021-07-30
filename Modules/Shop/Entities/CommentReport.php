<?php

namespace Modules\Shop\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReport extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CommentReportFactory::new();
    }
}
