<?php

namespace App\Models;

use App\Notifications\ResetUserPassword;
use DougSisk\CountryState\CountryState;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as EmailVerification;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Modules\Cart\Entities\ShippingAddress;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Overtrue\LaravelLike\Traits\Liker;


/**
 * Class User
 * @package App\Models
 *
 */
class User extends Authenticatable implements HasLocalePreference, EmailVerification
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use SoftDeletes;
    use Liker;
    use CanRate;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'socialite_id',
        'profile_photo_path',
        'phone',
        'address',
        'country_code',
        'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'image'
    ];

    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function getCountryAttribute()
    {
        return auth()->user()->country_code ? (new CountryState)->getCountry(auth()->user()->country_code) : null;

    }

    public function format_admin_users()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'verified' => $this->verified_at ? true : false,
            'state' => $this->state,
            'country' => $this->country,
            'image' => asset($this->image),

        ];
    }

    public function getImageAttribute($value)
    {
        $default = 'vendor/images/dashboard/noimg.png';
        if ($value) {
            if (substr($value->profile_photo_path, 0, 4) === "http") {
                return $value->profile_photo_path;
            }
            if ($value->profile_photo_url) {
                return $value->profile_photo_url;
            }
            return asset($default);
        }
        return asset($default);
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\EmailVerification($this->name));
    }
}
