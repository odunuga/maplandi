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

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images()
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
        return $this->hasMany(Parameter::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        $default = 'vendor/images/dashboard/noimg.png';
        $value = $this->image;
        if ($value) {
            if (substr($value->url, 0, 4) === "http") {
                return $value->url;
            }
            return asset($value->url);
        }
        return asset($default);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CategoryFactory::new();
    }
}
