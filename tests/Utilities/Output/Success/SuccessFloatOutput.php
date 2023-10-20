<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessFloatOutput extends Utility
{
    protected array $requiredInput = ['testProp'];

    protected array $outputTypes = [OutputType::FLOAT->value];

    protected float|null $testProp = null;

    public function execute(): Utility
    {
        $this->setOutput($this->testProp);

        return $this;
    }
}
