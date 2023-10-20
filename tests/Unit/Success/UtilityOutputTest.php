<?php

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


test('Utility validates output to be bool and returns it', function () {
    $value = true;
    $output = $this->utilityHelper->getUtility(SuccessBoolOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be string and returns it', function () {
    $value = 'value';
    $output = $this->utilityHelper->getUtility(SuccessStringOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be integer and returns it', function () {
    $value = 1;
    $output = $this->utilityHelper->getUtility(SuccessIntegerOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be float and returns it', function () {
    $value = 1.1;
    $output = $this->utilityHelper->getUtility(SuccessFloatOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be array and returns it', function () {
    $value = [];
    $output = $this->utilityHelper->getUtility(SuccessArrayOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be object and returns it', function () {
    $value = new stdClass;
    $output = $this->utilityHelper->getUtility(SuccessObjectOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});


test('Utility validates output to be class instance and returns it', function () {
    $value = new TestClass;
    $output = $this->utilityHelper->getUtility(SuccessClassInstanceOutput::class, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be int or float and returns it', function () {
    $utility = resolve(SuccessIntegerFloatOutput::class);

    $value = 1;
    $output = $this->utilityHelper->useUtility($utility, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = 1.1;
    $output = $this->utilityHelper->useUtility($utility, ['testProp' => $value]);
    $this->assertSame($value, $output);
});

test('Utility validates output to be array, object or null and returns it', function () {
    $utility = resolve(SuccessArrayObjectNullOutput::class);

    $value = [];
    $output = $this->utilityHelper->useUtility($utility, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = new stdClass;
    $output = $this->utilityHelper->useUtility($utility, ['testProp' => $value]);
    $this->assertSame($value, $output);

    $value = null;
    $output = $this->utilityHelper->useUtility($utility, ['testProp' => $value]);
    $this->assertSame($value, $output);
});
