<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Shop\Repository\ShopInterface;
use Modules\Shop\Repository\ShopRepository;

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
        $repos = [
            ['key' => ShopInterface::class, 'value' => ShopRepository::class],
        ];
        foreach ($repos as $repo) {
            $this->app->bind($repo['key'], $repo['value']);
        }

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
