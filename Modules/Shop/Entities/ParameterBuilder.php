<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParameterBuilder extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $casts = [
        'attribute' => 'array'
    ];

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ParameterBuilderFactory::new();
    }
}
