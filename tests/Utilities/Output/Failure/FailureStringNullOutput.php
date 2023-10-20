<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class FailureStringNullOutput extends Utility
{
    protected array $outputTypes = [OutputType::STRING->value, OutputType::NULL->value];

    public function execute(): Utility
    {
        $this->setOutput(3);

        return $this;
    }
}
