<?php

namespace SoftPulze\InertiaLookup;

use SoftPulze\InertiaLookup\Commands\InertiaLookupCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class InertiaLookupServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('inertia-lookup')
            ->hasConfigFile();
    }
}
