<?php


use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;

test('Utility validates required parameter 1', function () use ($actual) {
    $parameters = [
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testString property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);

test('Utility validates required parameter 2', function () use ($actual) {
    $parameters = [
        'testString' => 'test',
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testInt property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);

test('Utility validates required parameter 3', function () use ($actual) {
    $parameters = [
        'testString' => 'test',
        'testInt'    => 1,
        'testObject' => new stdClass,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testFloat property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);

test('Utility validates required parameter 4', function () use ($actual) {
    $parameters = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testObject property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);

test('Utility validates required parameter 5', function () use ($actual) {
    $parameters = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testClass'  => new TestClass,
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testArray property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);

test('Utility validates required parameter 6', function () use ($actual) {
    $parameters = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testArray'  => [],
    ];
    $output = $this->utilityHelper->setUtilityInput(RequiredInput::class, $parameters);
})->throws(
    InvalidPropertyException::class,
    'testClass property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput should presents.'
);
