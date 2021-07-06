<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->hasOne(ParameterBuilder::class);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ParameterFactory::new();
    }
}
