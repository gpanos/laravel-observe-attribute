<?php

namespace Gpanos\ObserveAttribute;

use Illuminate\Support\ServiceProvider;

class ObserveAttributeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        (new ObserverRegistrar())
            ->useRootNamespace(app()->getNamespace())
            ->registerDirectory($this->getDirectory());
    }

    protected function getDirectory(): string
    {
        $testClassDirectory = __DIR__ . '/../tests/Stubs';

        return app()->runningUnitTests() ? __DIR__ . '/../tests/Stubs' : app_path('Models');
    }
}
