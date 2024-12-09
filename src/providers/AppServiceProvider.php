<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:07 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iPlan\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole())
        {
            if (iplan('database.migrations.include', true)) $this->loadMigrationsFrom(iplan_path('database/migrations'));
        }
        $this->mergeConfigFrom(iplan_path('config/iplan.php'), 'ilaravel.main.iplan');
        // You can keep this in your filters.php file
        $this->app->singleton('ilaravel_types', function(){
            $model = imodal('Type');
            return $model::all();
        });
    }

    public function register()
    {
        parent::register();
    }
}
