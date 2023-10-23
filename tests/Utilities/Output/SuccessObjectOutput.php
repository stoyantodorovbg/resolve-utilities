<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessObjectOutput extends Utility
{
    protected object $output;

    protected array $requiredInput = ['testProp'];

    protected object|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
