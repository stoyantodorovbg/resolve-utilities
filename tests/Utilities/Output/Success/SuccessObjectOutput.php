<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessObjectOutput extends Utility
{
    protected array $requiredInput = ['testProp'];

    protected array $outputTypes = [OutputType::OBJECT->value];

    protected object|null $testProp = null;

    public function execute(): Utility
    {
        $this->setOutput($this->testProp);

        return $this;
    }
}
