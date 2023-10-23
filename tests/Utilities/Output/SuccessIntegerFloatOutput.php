<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessIntegerFloatOutput extends Utility
{
    protected int|float $output;

    protected array $requiredInput = ['testProp'];

    protected int|float|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
