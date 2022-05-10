<?php

namespace Williamug\MoneyFormatter\Commands;

use Illuminate\Console\Command;

class MoneyFormatterCommand extends Command
{
    public $signature = 'money-formatter';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
