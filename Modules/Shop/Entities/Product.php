<?php

namespace Modules\Shop\Entities;

use BinaryCats\Sku\HasSku;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Overtrue\LaravelLike\Traits\Likeable;

class Product extends Model
{
    use HasFactory;
    use Rateable;
    use HasSku;
    use Likeable;
    use InteractsWithViews;

    protected $fillable = [];

    public function image(): morphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(): morphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function currency(): belongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function tags(): morphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parameters(): belongsToMany
    {
        return $this->belongsToMany(Parameter::class, 'product_parameters')->withPivot('value');
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductFactory::new();
    }
}
