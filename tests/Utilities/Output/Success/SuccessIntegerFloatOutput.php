<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessIntegerFloatOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'required',
    ];

    protected int|float|null $testProp = null;

    protected array $outputTypes = [OutputType::INT->value, OutputType::FLOAT->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
