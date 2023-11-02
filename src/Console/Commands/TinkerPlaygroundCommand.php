<?php

namespace OldevCo\LaravelTinkerTemplates\Console\Commands;

use Illuminate\Console\Command;

class TinkerPlaygroundCommand extends Command
{
    protected $name = 'tinker:playground';

    protected function configure()
    {
        parent::configure();

        $this->setAliases(['playground']);
    }

    public function handle(): int
    {
        $z = config('tinker-playground');

        return 0;
    }
}
