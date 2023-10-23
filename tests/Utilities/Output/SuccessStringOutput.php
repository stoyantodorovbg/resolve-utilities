<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessStringOutput extends Utility
{
    protected string $output;

    protected string|null $testProp = null;

    protected array $requiredInput = ['testProp'];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
