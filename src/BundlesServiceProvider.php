<?php

namespace ConnorLock05\LaravelBundles;

use ConnorLock05\LaravelBundles\Commands\MakeBundle;
use Illuminate\Support\ServiceProvider;

class BundlesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/bundles.php' => config_path('bundles.php'),
        ], 'bundles-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeBundle::class,
            ]);
        }
    }
}
