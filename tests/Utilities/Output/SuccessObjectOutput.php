<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessObjectOutput extends Utility
{
    protected object $output;

    protected object|null $testProp = null;

    protected array $requiredInput = ['testProp'];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
