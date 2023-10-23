<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output;

use StoyanTodorov\ResolveUtilities\Utility;

class SuccessArrayOutput extends Utility
{
    protected array $output;

    protected array|null $testProp = null;

    protected array $requiredInput = ['testProp'];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
