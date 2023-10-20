<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required;


use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

class RequiredInput extends Utility
{
    protected array $inputProperties = [
        'testString' => 'required',
        'testInt'    => 'required',
        'testFloat'  => 'required',
        'testObject' => 'required',
        'testArray'  => 'required',
        'testClass'  => 'required',
    ];

    protected string|null $testString;
    protected int|null $testInt;
    protected float|null $testFloat;
    protected object|null $testObject;
    protected array|null $testArray;
    protected TestClass|null $testClass;

    public function execute(): Utility
    {
        return $this;
    }
}
