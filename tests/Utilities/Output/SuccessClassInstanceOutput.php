<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessClassInstanceOutput extends Utility
{
    protected TestClass $output;

    protected array $requiredInput = ['testProp'];

    protected TestClass|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
