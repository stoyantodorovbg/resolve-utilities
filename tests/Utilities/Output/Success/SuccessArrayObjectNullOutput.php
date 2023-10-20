<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\OutputType;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayObjectNullOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'required',
    ];

    protected array|object|bool|null $testProp = null;

    protected array $outputTypes = [OutputType::ARRAY->value, OutputType::OBJECT->value, OutputType::NULL->value];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
