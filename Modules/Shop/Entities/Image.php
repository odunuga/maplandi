<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function imageable()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ImageFactory::new();
    }
}
