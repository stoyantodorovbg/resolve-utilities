<?php

namespace StoyanTodorov\ResolveUtilities\Contracts;

interface ResolverInterface
{
    /**
     * @param string $abstract
     * @param array  $properties
     * @return mixed
     * @throws InvalidPropertyException
     */
    public function useUtility(string $abstract, array $properties): mixed;
}
