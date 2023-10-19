<?php

namespace StoyanTodorov\ResolveUtilities;

use App\Exceptions\InvalidPropertyException;
use StoyanTodorov\ResolveUtilities\Contracts\ResolverInterface;

trait HasResolver
{
    protected ResolverInterface|null $resolver;

    /**
     * @throws InvalidPropertyException
     */
    protected function useUtility(string $abstract, array $properties): mixed
    {
        return $this->getResolver()->useUtility($abstract, $properties);
    }

    protected function getResolver(): ResolverInterface
    {
        if (! $this->resolver) {
            $this->setResolver();
        }

        return $this->resolver;
    }

    protected function setResolver(): void
    {
        $this->resolver = resolve(ResolverInterface::class);
    }
}
