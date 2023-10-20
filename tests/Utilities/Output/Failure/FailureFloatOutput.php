<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class FailureFloatOutput extends Utility
{
    protected array $outputTypes = [OutputType::FLOAT->value];

    public function execute(): Utility
    {
        $this->setOutput(3);

        return $this;
    }
}
