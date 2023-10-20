<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Utilities\Output\Success;

use StoyanTodorov\ResolveUtilities\Tests\Utilities\TestClass;
use StoyanTodorov\ResolveUtilities\Utility;

class SuccessClassInstanceOutput extends Utility
{
    protected array $inputProperties = [
        'testProp' => 'notNull',
    ];

    protected TestClass|null $testProp = null;

    protected array $outputTypes = [TestClass::class];

    public function execute(): Utility
    {
        $this->output = $this->testProp;

        return $this;
    }
}
