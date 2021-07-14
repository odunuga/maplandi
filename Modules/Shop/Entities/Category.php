<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CategoryFactory::new();
    }
}
