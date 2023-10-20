<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class FailureObjectOutput extends Utility
{
    protected array $outputTypes = [OutputType::OBJECT->value];

    public function execute(): Utility
    {
        $this->output = 3;

        return $this;
    }
}
