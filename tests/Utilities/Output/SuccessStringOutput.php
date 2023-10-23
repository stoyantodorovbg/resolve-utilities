<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessStringOutput extends Utility
{
    protected string $output;

    protected array $requiredInput = ['testProp'];

    protected string|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
