<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Contracts\ResolverInterface;
use StoyanTodorov\ResolveUtilities\Exceptions\InvalidPropertyException;

class Resolver implements ResolverInterface
{
    protected array $utilities = [];

    /**
     * @throws InvalidPropertyException
     * @throws Exceptions\InvalidPropertyException
     */
    public function useUtility(string $abstract, array $properties): mixed
    {
        return $this->getUtility($abstract)
            ->setInput($properties)
            ->execute()
            ->getOutput();
    }

    protected function getUtility(string $abstract): Utility
    {
        if (! isset($this->utilities[$abstract])) {
            $this->resolveUtility($abstract);
        }

        return $this->utilities[$abstract];
    }

    protected function resolveUtility($abstract): void
    {
        $this->setUtility(resolve($abstract), $abstract);
    }

    protected function setUtility(Utility $utility, string $abstract): void
    {
        $this->utilities[$abstract] = $utility;
    }
}
