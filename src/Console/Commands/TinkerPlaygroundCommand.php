<?php

namespace OldevCo\LaravelTinkerTemplates\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use OldevCo\LaravelTinkerTemplates\Playground\TemplateFactoryInterface;
use OldevCo\LaravelTinkerTemplates\Playground\Templates\SimpleClassTemplate;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class TinkerPlaygroundCommand extends Command
{
    private const ARGUMENT_SCRIPT_FILENAME = 'script_filename';
    private const OPTION_TEMPLATE          = 'template';

    protected $name = 'tinker:playground';

    private TemplateFactoryInterface $templateFactory;

    public function __construct(TemplateFactoryInterface $templateFactory)
    {
        parent::__construct();

        $this->templateFactory = $templateFactory;
    }

    protected function configure()
    {
        parent::configure();

        $this->setAliases(['playground']);

        $this->addArgument(
            self::ARGUMENT_SCRIPT_FILENAME,
            InputArgument::OPTIONAL,
            'Name of the php script (without .php extension) - its name will be tinker.<name>.php',
            'script'
        );

        $this->addOption(
            self::OPTION_TEMPLATE,
            null,
            InputOption::VALUE_OPTIONAL,
            'Name of the template',
            config('tinker-playground.default_template')
        );
    }

    public function handle(): int
    {
        $relativePath = rtrim(config('tinker-playground.script_dir'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $scriptName     = $this->input->getArgument(self::ARGUMENT_SCRIPT_FILENAME);
        $scriptFileName = sprintf('%s.php', $scriptName);
        $path           = $relativePath . $scriptFileName;

        if (!Storage::disk('local')->exists($path)) {
            $template = $this->input->getOption(self::OPTION_TEMPLATE);

            $template = $this->templateFactory->create($scriptName, $template);

            Storage::disk('local')->put($path, $template->asString());
        }

        return 0;
    }
}
