<?php


namespace Modules\Admin\Traits;


use Modules\Admin\Entities\GeneralSetting;

trait SiteSettingsTraits
{

    private function get_site_settings()
    {
        $check = GeneralSetting::count();
        if ($check > 0) {
            $site_settings = GeneralSetting::with('currency')->first();
        } else {
            GeneralSetting::firstOrCreate([
                'site_name' => 'Maplandi',
                'site_description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.',
                'opening_hours' => ["Daily: 9.30 AM–6.00 PM",
                    "Sunday & Holidays: Closed"],
                'tax' => 7.5
            ]);
            $site_settings = GeneralSetting::with('currency')->first();
        }
        if (check_user_currency() == false) {
            $currency_id = $site_settings->currency->id;
            $code = $site_settings->currency->code;
            set_user_currency($currency_id, $code);
        }
        return $site_settings;
    }
}
