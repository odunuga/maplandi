<?php

namespace Modules\Shop\Entities;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Product extends Model
{
    use HasFactory;
    use Rateable;
    use InteractsWithViews;

    protected $fillable = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductFactory::new();
    }
}
