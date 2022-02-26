<?php

namespace Yazan\Setting;

use Illuminate\Support\ServiceProvider;
use Yazan\DataTable\Commands\DataTableCommand;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->loadMigrationsFrom(__DIR__ . '/Databases/migrations');

    }
}
