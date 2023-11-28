<?php

namespace OldevCo\LaravelTinkerTemplates\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Tinker\Console\TinkerCommand;
use OldevCo\LaravelTinkerTemplates\Console\Commands\TinkerPlaygroundCommand;
use OldevCo\LaravelTinkerTemplates\Playground\TemplateFactory;
use OldevCo\LaravelTinkerTemplates\Playground\TemplateFactoryInterface;

class TinkerPlaygroundServiceProvider extends ServiceProvider
{
    private const COMMAND_TAG = 'command.tinker.playground';

    public function register()
    {
        $this->app->singleton(self::COMMAND_TAG, function (Application $app) {
            return $app->make(TinkerPlaygroundCommand::class);
        });

        $this->commands([self::COMMAND_TAG]);

        $this->app->singleton(TemplateFactoryInterface::class, TemplateFactory::class);
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
