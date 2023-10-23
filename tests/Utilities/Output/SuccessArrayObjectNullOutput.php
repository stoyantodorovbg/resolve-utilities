<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayObjectNullOutput extends Utility
{
    protected array|object|null $output;

    protected array $requiredInput = ['testProp'];

    protected array|object|bool|null $testProp = null;

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
