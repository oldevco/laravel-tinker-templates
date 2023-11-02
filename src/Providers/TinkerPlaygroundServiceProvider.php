<?php

namespace OldevCo\LaravelTinkerTemplates\Providers;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Tinker\Console\TinkerCommand;
use OldevCo\LaravelTinkerTemplates\Console\Commands\TinkerPlaygroundCommand;

class TinkerPlaygroundServiceProvider extends ServiceProvider
{
    private const COMMAND_TAG = 'command.tinker.playground';

    public function register()
    {
        $this->app->singleton(self::COMMAND_TAG, function () {
            return new TinkerPlaygroundCommand();
        });

        $this->commands([self::COMMAND_TAG]);
    }

    public function boot()
    {
        $source = realpath($raw = __DIR__ . '../../../config/tinker-playground.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('tinker-playground.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('tinker-playground');
        }

        $this->mergeConfigFrom($source, 'tinker-playground');
    }
}
