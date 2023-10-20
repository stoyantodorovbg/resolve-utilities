<?php

namespace StoyanTodorov\ResolveUtilities\Contracts;

use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

interface ResolverInterface
{
    /**
     * @param string $abstract
     * @param array  $input
     * @return mixed
     * @throws InvalidPropertyException
     */
    public function useUtility(string $abstract, array $input): mixed;
}
