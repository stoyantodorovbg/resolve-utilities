<?php

namespace StoyanTodorov\ResolveUtilities\Commands;

use Illuminate\Console\Command;

class ResolveUtilitiesCommand extends Command
{
    public $signature = 'resolve-utilities';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
