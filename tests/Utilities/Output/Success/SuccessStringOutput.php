<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessStringOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'required',
    ];

    protected string|null $testProp = null;

    protected array $outputTypes = [OutputType::STRING->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
