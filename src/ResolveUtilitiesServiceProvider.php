<?php

namespace StoyanTodorov\ResolveUtilities;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StoyanTodorov\ResolveUtilities\Commands\ResolveUtilitiesCommand;

class ResolveUtilitiesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('resolve-utilities')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_resolve-utilities_table')
            ->hasCommand(ResolveUtilitiesCommand::class);
    }
}
