<?php

namespace StoyanTodorov\ResolveUtilities;

use StoyanTodorov\ResolveUtilities\Contracts\ResolverInterface;

trait HasResolver
{
    protected ResolverInterface|null $resolver = null;

    protected function useUtility(string $abstract, array $input): mixed
    {
        return $this->getResolver()->useUtility($abstract, $input);
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
