<?php

namespace StoyanTodorov\ResolveUtilities;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StoyanTodorov\ResolveUtilities\Contracts\ResolverInterface;

class ResolveUtilitiesServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        $this->app->bind(ResolverInterface::class, Resolver::class);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('resolve-utilities')
            ->hasConfigFile();
    }
}
