<?php

namespace SoftPulze\InertiaLookup;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SoftPulze\InertiaLookup\Commands\InertiaLookupCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_inertia_lookup_table')
            ->hasCommand(InertiaLookupCommand::class);
    }
}
