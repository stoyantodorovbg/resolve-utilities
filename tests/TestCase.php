<?php

namespace StoyanTodorov\ResolveUtilities\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use StoyanTodorov\ResolveUtilities\ResolveUtilitiesServiceProvider;
use StoyanTodorov\ResolveUtilities\Tests\Helpers\UtilityHelper;

class TestCase extends Orchestra
{
    protected UtilityHelper $utilityHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->utilityHelper = resolve(UtilityHelper::class);
    }

    protected function getPackageProviders($app): array
    {
        return [
            ResolveUtilitiesServiceProvider::class,
            TestServiceProvider::class
        ];
    }
}
