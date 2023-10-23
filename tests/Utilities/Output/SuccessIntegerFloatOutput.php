<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessIntegerFloatOutput extends Utility
{
    protected int|float $output;

    protected int|float|null $testProp = null;

    protected array $requiredInput = ['testProp'];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
