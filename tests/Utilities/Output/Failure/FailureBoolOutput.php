<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class FailureBoolOutput extends Utility
{
    protected array $outputTypes = [OutputType::BOOL->value];

    public function execute(): Utility
    {
        $this->output = 3;

        return $this;
    }
}
