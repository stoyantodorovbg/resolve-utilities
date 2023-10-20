<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessFloatOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'notNull',
    ];

    protected float|null $testProp = null;

    protected array $outputTypes = [OutputType::FLOAT->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
