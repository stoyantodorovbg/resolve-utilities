<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayObjectNullOutput extends Utility
{
    protected array|object|null $output;

    protected array|object|bool|null $testProp = null;

    protected array $requiredInput = ['testProp'];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
