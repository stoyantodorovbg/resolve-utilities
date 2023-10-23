<?php

namespace StoyanTodorov\ResolveUtilities\Tests\Helpers;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;
use StoyanTodorov\ResolveUtilities\Utility;

class UtilityHelper
{
    public function getUtility(string $class, array $parameters): mixed
    {
        return resolve($class)->resetInput($parameters)->execute()->getOutput();
    }

    /**
     * @throws InvalidPropertyException
     */
    public function useUtility(Utility $utility, array $parameters): mixed
    {
        return $utility->resetInput($parameters)->execute()->getOutput();
    }

    public function setUtilityInput(string $class, array $parameters): Utility
    {
        return resolve($class)->resetInput($parameters);
    }
}
