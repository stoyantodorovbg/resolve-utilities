<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Failure;

use StoyanTodorov\ResolveUtilities\Utility;

class FailureStringOutput extends Utility
{
    protected array $outputTypes = ['string'];

    public function execute(): Utility
    {
        $this->output = 3;

        return $this;
    }
}
