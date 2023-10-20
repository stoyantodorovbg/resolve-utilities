<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class FailureIntOutput extends Utility
{
    protected array $outputTypes = [OutputType::INT->value];

    public function execute(): Utility
    {
        $this->setOutput('3');

        return $this;
    }
}
