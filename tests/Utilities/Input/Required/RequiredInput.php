<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required;

use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

class RequiredInput extends Utility
{
    protected array|null $output;

    protected array $requiredInput = ['testString', 'testInt', 'testFloat', 'testObject', 'testArray', 'testClass'];

    protected string|null $testString;
    protected int|null $testInt;
    protected float|null $testFloat;
    protected object|null $testObject;
    protected array|null $testArray;
    protected TestClass|null $testClass;

    public function execute(): Utility
    {
        $this->output = [
            'testString' => $this->testString,
            'testInt'    => $this->testInt,
            'testFloat'  => $this->testFloat,
            'testObject' => $this->testObject,
            'testArray'  => $this->testArray,
            'testClass'  => $this->testClass,
        ];

        return $this;
    }
}
