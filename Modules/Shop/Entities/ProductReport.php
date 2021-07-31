<?php

namespace Modules\Shop\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function format_product_report()
    {
        $reporter = isset($this->reporter) ? $this->reporter->name : '';
        $product = isset($this->product) ? $this->product->title : '';
        $image = isset($this->product) ? $this->product->image_url : '';

        $message = isset($this->comment) ? $this->comment : '';
        return [
            'id' => $this->id,
            'reporter' => $reporter,
            'message' => $message,
            'product' => $product,
            'product_image' => $image,
            'created_at' => $this->created_at->format('h:m a, d M Y')
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ProductReportFactory::new();
    }
}
