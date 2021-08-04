<?php

namespace Modules\Admin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimony extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function format_admin_testimony()
    {
        $comment_by = isset($this->user) ? $this->user->name : '';
        $created_at = isset($this->created_at) ? $this->created_at->format('d m Y') : '';
        return [
            'id' => $this->id,
            'comment_by' => $comment_by,
            'body' => $this->body,
            'created_by' => $created_at
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TestimonyFactory::new();
    }
}
