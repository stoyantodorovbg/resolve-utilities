<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessClassInstanceOutput extends Utility
{
    protected array $requiredInput = ['testProp'];

    protected array $outputTypes = [TestClass::class];

    protected TestClass|null $testProp = null;

    public function execute(): Utility
    {
        $this->setOutput($this->testProp);

        return $this;
    }
}
