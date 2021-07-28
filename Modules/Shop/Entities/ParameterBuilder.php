<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ParameterBuilder
 * @package Modules\Shop\Entities
 * @property integer parameter_id
 * @property mixed|string type_name
 * @property mixed|string type_id
 * @property mixed|string type
 * @property mixed|string class
 * @property array attributes
 *
 */
class ParameterBuilder extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'attributes' => 'array'
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
