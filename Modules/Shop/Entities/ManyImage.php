<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManyImage extends Model
{
    use HasFactory;

    public function many_imageable()
    {
        return $this->morphTo();
    }

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ManyImageFactory::new();
    }
}
