<?php

namespace Gpanos\ObserveAttribute;

use Illuminate\Support\ServiceProvider;

class ObserveAttributeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishing();

        $this->registerObservers();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/observe-attribute.php', 'observe-attribute');
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/observe-attribute.php' => $this->app->configPath('observe-attribute.php'),
            ], 'observe-attribute-config');
        }
    }

    protected function registerObservers(): void
    {
        (new ObserverRegistrar())
            ->useRootNamespace(app()->getNamespace())
            ->registerDirectory($this->getDirectory());
    }

    protected function getDirectory(): string
    {
        $testClassDirectory = __DIR__ . '/../tests/Stubs';

        return app()->runningUnitTests() ? __DIR__ . '/../tests/Stubs' : config('observe-attribute.directory');
    }
}
