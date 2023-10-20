<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default;

use StoyanTodorov\ResolveUtilities\Utility;

class DefaultInput extends Utility
{
    protected string|null $test = 'default';

    protected array $inputProperties = [
        'test' => 'default'
    ];

    public function execute(): Utility
    {
        return $this;
    }
}
