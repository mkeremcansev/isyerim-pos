<?php

namespace Mkeremcansev\IsyerimPos\Commands;

use Illuminate\Console\Command;

class IsyerimPosCommand extends Command
{
    public $signature = 'isyerim-pos';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
