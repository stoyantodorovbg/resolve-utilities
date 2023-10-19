<?php

namespace StoyanTodorov\ResolveUtilities\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \StoyanTodorov\ResolveUtilities\ResolveUtilities
 */
class ResolveUtilities extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \StoyanTodorov\ResolveUtilities\ResolveUtilities::class;
    }
}
