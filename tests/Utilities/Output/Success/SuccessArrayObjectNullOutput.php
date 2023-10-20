<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayObjectNullOutput extends Utility
{
    protected array $requiredInput = ['testProp'];

    protected array $outputTypes = [OutputType::ARRAY->value, OutputType::OBJECT->value, OutputType::NULL->value];

    protected array|object|bool|null $testProp = null;

    public function execute(): Utility
    {
        $this->setOutput($this->testProp);

        return $this;
    }
}
