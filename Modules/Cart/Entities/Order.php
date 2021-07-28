<?php

namespace Modules\Cart\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Entities\Cart;

/**
 * @property int id
 * @property boolean status
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
 * @property int delivery_status
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'paid_at' => 'datetime',
        'cart' => 'array',
        'status' => 'bool',
        'transaction_status' => 'bool'
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function formatUsers()
    {

        return [
            'id' => $this->id,
            'cart_id' => $this->cart_id,
            'reference' => $this->reference,
            'created_at' => $this->created_at->format('d M Y'),
            'payment_type' => $this->payment_type,
            'amount' => $this->amount,
            'paid_at' => $this->paid_at ? $this->paid_at->format('d M Y H:m a') : 'Not Paid',
            'status' => $this->status ? 'Successful' : 'Failed',
            'is_delivered' => $this->is_delivered
        ];
    }

    public function getIsDeliveredAttribute()
    {
        if ($this->delivery_status === 0) {
            return 'Pending';
        }
        if ($this->delivery_status === 1) {
            return 'On Transit';
        }
        if ($this->delivery_status === 2) {
            return 'Delivered';
        }
        if ($this->delivery_status === 3) {
            return 'Cancelled';
        }
        return 'Pending';
    }

    public function format_admin_orders()
    {
        $address = $this->first_name . ' ' . $this->last_name . ' at ' . $this->address;
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'customer' => $this->buyer->name,
            'amount' => currency_with_price($this->amount, $this->currency),
            'location' => $address,
            'status' => $this->status == true ? 'Successful' : 'Failed',
            'delivered' => $this->is_delivered,
            'date' => $this->created_at->format('d M Y')
        ];
    }

    public function format_transaction_record()
    {
        $address = $this->first_name . ' ' . $this->last_name . ' at ' . $this->address;
        return [
            'id' => $this->id,
            'customer' => $this->buyer->name,
            'amount' => currency_with_price($this->amount, $this->currency),
            'items' => $this->cart,
            'location' => $address,
            'date' => $this->created_at->format('d M Y'),
            'invoice' => url('control-room/invoice/' . $this->reference)

        ];
    }

    protected static function newFactory()
    {
        return \Modules\Cart\Database\factories\OrderFactory::new();
    }
}
