<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property mixed product_id
 * @property mixed parameter_id
 * @property mixed|string value
 * @property mixed|string stock
 */
class ProductParameter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getInstockAttribute()
    {
        return $this->stock < 1;
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductParameterFactory::new();
    }
}
