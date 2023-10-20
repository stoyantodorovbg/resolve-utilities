<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessIntegerOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'notNull',
    ];

    protected int|null $testProp = null;

    protected array $outputTypes = [OutputType::INT->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
