<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'required',
    ];

    protected array|null $testProp = null;

    protected array $outputTypes = [OutputType::ARRAY->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
