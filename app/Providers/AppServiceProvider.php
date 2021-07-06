<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Traits\SiteSettingsTraits;

class AppServiceProvider extends ServiceProvider
{
    use SiteSettingsTraits;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function ($view) {
            return $view->with(['site_settings' => $this->get_site_settings()]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
