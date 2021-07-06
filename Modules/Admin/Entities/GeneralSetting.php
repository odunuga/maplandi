<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GeneralSetting
 * @package Modules\Admin\Entities
 * @property mixed site_name
 * @property mixed site_motto
 * @property mixed site_cac
 * @property mixed site_description
 * @property mixed site_email
 * @property mixed contact_number
 * @property mixed site_address
 * @property mixed opening_hours
 * @property mixed facebook_handler
 * @property mixed twitter_handler
 * @property mixed linkedin_handler
 * @property mixed instagram_handler
 */
class GeneralSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'opening_hours' => 'array'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\GeneralSettingFactory::new();
    }
}
