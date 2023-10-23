<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessBoolOutput extends Utility
{
    protected bool $output;

    protected array $requiredInput = ['testProp'];

    protected bool|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
