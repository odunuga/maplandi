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
            $site_settings = $this->get_general_setting();
        }
        if (check_user_currency() == false) {
            $currency_id = $site_settings->currency->id;
            $code = $site_settings->currency->code;
            set_user_currency($currency_id, $code);
        }
        return $site_settings;
    }

    private function update_site_settings($data)
    {
        $site_settings = $this->get_site_settings();
        $save_image = $this->upload_site_image();

        if (isset($data['site_name'])) $site_settings->site_name = $data['site_name'];
        if ($save_image) $site_settings->site_logo = $save_image;
        if (isset($data['site_motto'])) $site_settings->site_motto = $data['site_motto'];
        if (isset($data['site_cac'])) $site_settings->site_cac = $data['site_cac'];
        if (isset($data['site_description'])) $site_settings->site_description = $data['site_description'];
        if (isset($data['site_email'])) $site_settings->site_email = $data['site_email'];
        if (isset($data['contact_number'])) $site_settings->contact_number = $data['contact_number'];
        if (isset($data['site_address'])) $site_settings->site_address = $data['site_address'];
        if (isset($data['opening_hours'])) $site_settings->opening_hours = $data['opening_hours'];
        if (isset($data['facebook_handler'])) $site_settings->facebook_handler = $data['facebook_handler'];
        if (isset($data['twitter_handler'])) $site_settings->twitter_handler = $data['twitter_handler'];
        if (isset($data['linkedin_handler'])) $site_settings->linkedin_handler = $data['linkedin_handler'];
        if (isset($data['instagram_handler'])) $site_settings->instagram_handler = $data['instagram_handler'];
        if (isset($data['default_currency'])) $site_settings->default_currency = $data['default_currency'];
        if (isset($data['tax'])) $site_settings->tax = $data['tax'];
        $site_settings->save();

    }

    private function upload_site_image()
    {
        if (request()->hasFile('site_logo')) {
            request()->validate([
                'site_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $filenameWithExt = request()->file('site_logo')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = request()->file('site_logo')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            return request()->image->move(public_path('vendor/images'), $fileNameToStore);
        }
        return null;


    }

    private function get_general_setting()
    {
        return GeneralSetting::with('currency')->first();
    }
}
