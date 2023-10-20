<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Integration;

use StoyanTodorov\ResolveUtilities\HasResolver;

class HasResolverClient
{
    use HasResolver;

    public function test(string $abstract, array $input)
    {
        return $this->useUtility($abstract, $input);
    }
}
