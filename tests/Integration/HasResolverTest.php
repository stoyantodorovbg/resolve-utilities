<?php

use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default\DefaultInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessArrayObjectNullOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessArrayOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessBoolOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessClassInstanceOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessFloatOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessIntegerFloatOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessIntegerOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessObjectOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\SuccessStringOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;


test('HasResolver trait returns bool', function () {
    $value = true;
    $output = $this->client->test(SuccessBoolOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns string', function () {
    $value = 'value';
    $output = $this->client->test(SuccessStringOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns int', function () {
    $value = 1;
    $output = $this->client->test(SuccessIntegerOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns float', function () {
    $value = 1.1;
    $output = $this->client->test(SuccessFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns array', function () {
    $value = [];
    $output = $this->client->test(SuccessArrayOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns object', function () {
    $value = new stdClass;
    $output = $this->client->test(SuccessObjectOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});


test('HasResolver trait returns custom class instance', function () {
    $value = new TestClass;
    $output = $this->client->test(SuccessClassInstanceOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns int 1', function () {
    $value = 1;
    $output = $this->client->test(SuccessIntegerFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = 1.1;
    $output = $this->client->test(SuccessIntegerFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('HasResolver trait returns array 1', function () {
    $value = [];
    $output = $this->client->test(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = new stdClass;
    $output = $this->client->test(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = null;
    $output = $this->client->test(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class sets the required input properly', function () {
    $input = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testObject' => new stdClass,
        'testArray'  => [],
        'testClass'  => new TestClass,
    ];
    $output = $this->client->test(RequiredInput::class, $input);
    $this->assertSame($input, $output);
});

test('Resolver class sets the default input properly', function () {
    $input = [];
    $output = $this->client->test(DefaultInput::class, $input);
    $expected = [
        'testString' => 'test',
        'testInt'    => 1,
        'testFloat'  => 1.1,
        'testArray'  => [],
    ];
    $this->assertSame($expected, $output);

    $input = [
        'testString' => 'test 123',
        'testInt'    => 7,
        'testFloat'  => 7.8,
        'testArray'  => ['test'],
    ];
    $output = $this->client->test(DefaultInput::class, $input);
    $this->assertSame($input, $output);
});
