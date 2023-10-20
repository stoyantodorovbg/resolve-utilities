<?php

use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Default\DefaultInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Input\Required\RequiredInput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessArrayObjectNullOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessArrayOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessBoolOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessClassInstanceOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessFloatOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessIntegerFloatOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessIntegerOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessObjectOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success\SuccessStringOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;


test('Resolver class returns bool', function () {
    $value = true;
    $output = $this->resolver->useUtility(SuccessBoolOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns string', function () {
    $value = 'value';
    $output = $this->resolver->useUtility(SuccessStringOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns int', function () {
    $value = 1;
    $output = $this->resolver->useUtility(SuccessIntegerOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns float', function () {
    $value = 1.1;
    $output = $this->resolver->useUtility(SuccessFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns array', function () {
    $value = [];
    $output = $this->resolver->useUtility(SuccessArrayOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns object', function () {
    $value = new stdClass;
    $output = $this->resolver->useUtility(SuccessObjectOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});


test('Resolver class returns custom class instance', function () {
    $value = new TestClass;
    $output = $this->resolver->useUtility(SuccessClassInstanceOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns int 1', function () {
    $value = 1;
    $output = $this->resolver->useUtility(SuccessIntegerFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = 1.1;
    $output = $this->resolver->useUtility(SuccessIntegerFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Resolver class returns array 1', function () {
    $value = [];
    $output = $this->resolver->useUtility(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = new stdClass;
    $output = $this->resolver->useUtility(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = null;
    $output = $this->resolver->useUtility(SuccessArrayObjectNullOutput::class, ['testProp' => $value]);
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
    $output = $this->resolver->useUtility(RequiredInput::class, $input);
    $this->assertSame($input, $output);
});

test('Resolver class sets the default input properly', function () {
    $input = [];
    $output = $this->resolver->useUtility(DefaultInput::class, $input);
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
    $output = $this->resolver->useUtility(DefaultInput::class, $input);
    $this->assertSame($input, $output);
});
