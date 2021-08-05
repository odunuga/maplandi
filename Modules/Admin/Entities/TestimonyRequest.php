<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TestimonyRequest
 * @package Modules\Admin\Entities
 * @property int user_id
 * @property mixed token
 *
 */
class TestimonyRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TestimonyRequestFactory::new();
    }
}
