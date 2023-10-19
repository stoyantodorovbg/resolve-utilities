<?php

namespace StoyanTodorov\ResolveUtilities\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use StoyanTodorov\ResolveUtilities\ResolveUtilitiesServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ResolveUtilitiesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_resolve-utilities_table.php.stub';
        $migration->up();
        */
    }
}
