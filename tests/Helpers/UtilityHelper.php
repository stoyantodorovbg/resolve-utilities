<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Helpers;

use StoyanTodorov\ResolveUtilities\Utility;

class UtilityHelper
{
    public function getUtility(string $class, mixed $parameter): mixed
    {
        return resolve($class)->setInput(['testProp' => $parameter])->execute()->getOutput();
    }

    public function useUtility(Utility $utility, mixed $parameter): mixed
    {
        return $utility->setInput(['testProp' => $parameter])->execute()->getOutput();
    }
}
