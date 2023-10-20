<?php


use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureArrayObjectOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureArrayOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureBoolOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureFloatOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureIntOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureObjectOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringNullOutput;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringOutput;

test('Utility throws an error when returns int instead of string', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureStringOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringOutput should not be integer.'
);

test('Utility throws an error when returns string instead of int', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureIntOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureIntOutput should not be string.'
);

test('Utility throws an error when returns int instead of bool', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureBoolOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureBoolOutput should not be integer.'
);

test('Utility throws an error when returns int instead of array', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureArrayOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureArrayOutput should not be integer.'
);

test('Utility throws an error when returns int instead of object', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureObjectOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureObjectOutput should not be integer.'
);

test('Utility throws an error when returns int instead of float', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureFloatOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureFloatOutput should not be integer.'
);

test('Utility throws an error when returns int instead of array or object', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureArrayObjectOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureArrayObjectOutput should not be integer.'
);

test('Utility throws an error when returns int instead of string or null', function () {
    $value = 'value';
    $this->utilityHelper->getUtility(FailureStringNullOutput::class, ['testProp' => $value]);
})->throws(
    InvalidPropertyException::class,
    'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringNullOutput should not be integer.'
);
