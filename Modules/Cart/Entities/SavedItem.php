<?php

namespace Modules\Cart\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Entities\Product;

/**
 * Class SavedItem
 * @package Modules\Cart\Entities
 * @property integer user_id
 * @property integer|string cart_id
 * @property mixed name
 * @property double price
 * @property integer quantity
 * @property mixed attributes
 */
class SavedItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'sku');
    }

    protected static function newFactory()
    {
        return \Modules\Cart\Database\factories\SavedItemFactory::new();
    }
}
