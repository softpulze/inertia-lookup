<?php

namespace SoftPulze\InertiaLookup\Commands;

use Illuminate\Console\Command;

class InertiaLookupCommand extends Command
{
    public $signature = 'inertia-lookup';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
