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

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductFactory::new();
    }
}
