<?php

namespace Modules\Shop\Entities;

use BinaryCats\Sku\HasSku;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nagy\LaravelRating\Traits\Like\Likeable;
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Product extends Model
{
    use HasFactory;
    use Rateable;
    use HasSku;
    use Likeable;
    use InteractsWithViews;

    protected $fillable = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function currency(): belongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parameters(): hasMany
    {
        return $this->hasMany(ProductParameter::class);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductFactory::new();
    }
}
