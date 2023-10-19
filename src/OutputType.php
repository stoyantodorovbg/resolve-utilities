<?php

namespace StoyanTodorov\ResolveUtilities;

enum OutputType: string
{
    case NULL   = 'NULL';
    case BOOL   = 'boolean';
    case STRING = 'string';
    case INT    = 'integer';
    case FLOAT  = 'double';
    case ARRAY  = 'array';
    case OBJECT = 'object';
}
