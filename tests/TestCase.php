<?php

namespace StoyanTodorov\ResolveUtilities\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use StoyanTodorov\ResolveUtilities\Contracts\ResolverInterface;
use StoyanTodorov\ResolveUtilities\ResolveUtilitiesServiceProvider;
use StoyanTodorov\ResolveUtilities\Tests\Helpers\UtilityHelper;
use StoyanTodorov\ResolveUtilities\Tests\Integration\HasResolverClient;

class TestCase extends Orchestra
{
    protected UtilityHelper $utilityHelper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->utilityHelper = resolve(UtilityHelper::class);
        $this->client = resolve(HasResolverClient::class);
        $this->resolver = resolve(ResolverInterface::class);
    }

    protected function getPackageProviders($app): array
    {
        return [
            ResolveUtilitiesServiceProvider::class,
        ];
    }
}
