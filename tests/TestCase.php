<?php

namespace Gpanos\ObserveAttribute\Tests;

use Gpanos\ObserveAttribute\ObserveAttributeServiceProvider;
use Gpanos\ObserveAttribute\ObserverRegistrar;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected ObserverRegistrar $observerRegistrar;

    protected function setUp(): void
    {
        parent::setUp();

        $this->observerRegistrar = (new ObserverRegistrar())
            ->useBasePath($this->getTestPath())
            ->useRootNamespace('Gpanos\ObserveAttribute\Tests\\');
    }

    public function getTestPath(string $directory = null): string
    {
        return __DIR__ . ($directory ? '/' . $directory : '');
    }

    protected function getPackageProviders($app)
    {
        return [ObserveAttributeServiceProvider::class];
    }
}
