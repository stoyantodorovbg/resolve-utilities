<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessBoolOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'notNull',
    ];

    protected bool|null $testProp = null;

    protected array $outputTypes = [OutputType::BOOL->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
