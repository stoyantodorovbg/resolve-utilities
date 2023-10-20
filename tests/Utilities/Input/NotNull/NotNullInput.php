<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\NotNull;


use StoyanTodorov\ResolveUtilities\Utility;

class NotNullStringInput extends Utility
{
    protected string|null $test;

    protected array $inputProperties = [
        'test' => 'notNull'
    ];

    public function execute(): Utility
    {
        return $this;
    }
}
