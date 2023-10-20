<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessObjectOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'required',
    ];

    protected object|null $testProp = null;

    protected array $outputTypes = [OutputType::OBJECT->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
