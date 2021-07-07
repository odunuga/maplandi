<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function image()
    {
        return $this->morphTo(Image::class, 'imageable');
    }

    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CategoryFactory::new();
    }
}
