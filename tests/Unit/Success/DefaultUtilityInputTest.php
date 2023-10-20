<?php

use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default\DefaultInput;

test("Utility don't expect default parameters", function () {
    $output = $this->utilityHelper->getUtility(DefaultInput::class, []);
    $default = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testArray'  => [],
    ];
    $this->assertSame($default, $output);
});

test('Utility sets the received parameters when they are default', function () {
    $parameters = [
        'testString' => 'test 123',
        'testInt'    => 7,
        'testFloat'  => 7.8,
        'testArray'  => ['test'],
    ];
    $output = $this->utilityHelper->getUtility(DefaultInput::class, $parameters);
    $this->assertSame($parameters, $output);
});
