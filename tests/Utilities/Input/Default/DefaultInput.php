<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default;

use StoyanTodorov\ResolveUtilities\Utility;

class DefaultInput extends Utility
{
    protected array $output;

    protected string|null $testString;
    protected int|null $testInt;
    protected float|null $testFloat;
    protected array|null $testArray;

    protected array $requiredInput = ['testString', 'testInt', 'testFloat', 'testArray'];

    protected array $defaultInput = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testArray'  => [],
    ];

    public function execute(): Utility
    {
        $this->output = [
            'testString' => $this->testString,
            'testInt'    => $this->testInt,
            'testFloat'  => $this->testFloat,
            'testArray'  => $this->testArray,
        ];

        return $this;
    }
}
