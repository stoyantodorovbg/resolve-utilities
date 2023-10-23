<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessFloatOutput extends Utility
{
    protected float $output;

    protected array $requiredInput = ['testProp'];

    protected float|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
