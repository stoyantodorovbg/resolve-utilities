<?php

namespace StoyanTodorov\ResolveUtilities\Tests;

use Illuminate\Support\ServiceProvider;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default\DefaultInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessStringOutput;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('success-string-output', SuccessStringOutput::class);
        $this->app->bind('failure-string-output', FailureStringOutput::class);
        $this->app->bind('not-null-string-input', RequiredInput::class);
        $this->app->bind('default-string-input', DefaultInput::class);
    }
}
