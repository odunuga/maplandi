<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cart
 * @package Modules\Shop\Entities
 *
 */
class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'cart' => 'array',
        'conditions' => 'array'
    ];


    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CartFactory::new();
    }
}
