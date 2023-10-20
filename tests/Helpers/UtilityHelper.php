<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Helpers;

use StoyanTodorov\ResolveUtilities\Utility;

class UtilityHelper
{
    public function getUtility(string $class, array $parameters): mixed
    {
        return resolve($class)->setInput($parameters)->execute()->getOutput();
    }

    public function useUtility(Utility $utility, array $parameters): mixed
    {
        return $utility->setInput($parameters)->execute()->getOutput();
    }

    public function setUtilityInput(string $class, array $parameters): Utility
    {
        return resolve($class)->setInput($parameters);
    }
}
