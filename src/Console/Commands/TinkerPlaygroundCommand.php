<?php

namespace OldevCo\LaravelTinkerTemplates\Console\Commands;

use Illuminate\Console\Command;
use OldevCo\LaravelTinkerTemplates\Playground\Templates\SimpleClassTemplate;
use Symfony\Component\Console\Input\InputArgument;

class TinkerPlaygroundCommand extends Command
{
    private const ARGUMENT_FILENAME = 'filename';

    protected $name = 'tinker:playground';

    protected function configure()
    {
        parent::configure();

        $this->setAliases(['playground']);

        $this->addArgument(
            self::ARGUMENT_FILENAME,
            InputArgument::OPTIONAL,
            'Name of the php script (without .php extension)',
            'script'
        );
    }

    public function handle(): int
    {
        $fileName = $this->input->getArgument(self::ARGUMENT_FILENAME);

        $template = new SimpleClassTemplate();

        echo $template->something();

        $z = config('tinker-playground');

        return 0;
    }
}
