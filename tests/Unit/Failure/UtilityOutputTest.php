<?php


use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;
use StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringOutput;

test('Utility throws an error when returns string instead of integer', function () {
    $value = 'value';
    $output = resolve(FailureStringOutput::class)
        ->setInput(['test' => $value])
        ->execute()
        ->getOutput();
})->throws(InvalidPropertyException::class, 'output property in StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure\FailureStringOutput should not be integer.');
