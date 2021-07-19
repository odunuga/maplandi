<?php

namespace Modules\Cart\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Entities\Cart;

/**
 * @property mixed status
 * @property mixed message
 * @property mixed transaction_id
 * @property mixed reference
 * @property mixed amount
 * @property mixed payment_message
 * @property mixed gateway_response
 * @property mixed paid_at
 * @property mixed channel
 * @property mixed currency
 * @property mixed cart
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed email
 * @property mixed address
 * @property mixed fees
 * @property mixed customer_code
 * @property bool transaction_confirmed
 * @property mixed phone
 * @property int|string|null user_id
 * @property int|string|null cart_id
 * @property string payment_type
 * @property int|string|null sub_total
 * @property int|string|null tax_added
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'paid_at' => 'datetime',
        'cart' => 'array'
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    protected static function newFactory()
    {
        return \Modules\Cart\Database\factories\OrderFactory::new();
    }
}
