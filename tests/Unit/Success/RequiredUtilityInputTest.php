<?php


use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

test('Utility can receives all required parameters', function () {
    $parameters = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
    $this->assertInstanceOf(Utility::class, $output);
});
