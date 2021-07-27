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

    protected $guarded = [];

    protected $casts = [
        'published' => 'bool',
        'featured' => 'bool',
        'hot' => 'bool',
        'available' => 'bool'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'product_parameters')->withPivot(['value', 'stock']);
    }

    public function admin_format()
    {
        $parameters = [];
        if ($this->parameters) {
            foreach ($this->parameters as $para) {
                $parameters[$para->title] = $para->pivot->value;
            }
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'parameters' => $parameters,
            'published' => $this->published,
            'featured' => $this->featured,
            'hot' => $this->hot,
            'price' => currency_with_price($this->price, $this->currency->symbol),
            'image' => asset($this->image->url)

        ];
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductFactory::new();
    }
}
