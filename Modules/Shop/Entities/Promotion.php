<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Promotion
 * @package Modules\Shop\Entities
 * @property int id
 * @property string title
 * @property mixed description
 * @property mixed start_date
 * @property mixed end_date
 * @property bool continuous
 */
class Promotion extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'continuous' => 'bool'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function format_admin_promotion()
    {

        $image = $this->image_url;

        return [
            'id' => $this->id,
            'image' => $image,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'continuous' => $this->continuous
        ];
    }

    public function getImageUrlAttribute()
    {
        $default = 'vendor/images/dashboard/noimg.png';
        $value = $this->image;
        if ($value) {
            if (substr($value->url, 0, 4) === "http") {
                return $value->url;
            }
            return asset($value->url);
        }
        return asset($default);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\PromotionFactory::new();
    }
}
