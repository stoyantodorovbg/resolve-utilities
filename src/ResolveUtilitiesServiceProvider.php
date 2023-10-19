<?php

namespace StoyanTodorov\ResolveUtilities;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ResolveUtilitiesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('resolve-utilities')
            ->hasConfigFile();
    }
}
