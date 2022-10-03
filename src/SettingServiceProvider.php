<?php

namespace Yazan\Setting;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Setting', Setting::class);
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

//        $this->loadMigrationsFrom(__DIR__ . '/Databases/migrations');

        $this->publishes([
                             __DIR__.'/Databases/migrations' => database_path('migrations')
                         ], 'settings');
    }
}
