<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tag
 * @package Modules\Shop\Entities
 * @property mixed title
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function product()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\TagFactory::new();
    }
}
