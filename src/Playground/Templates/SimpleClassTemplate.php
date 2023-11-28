<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Templates;

use OldevCo\LaravelTinkerTemplates\Playground\TemplateRenderInterface;

class SimpleClassTemplate implements TemplateRenderInterface
{
    private string $template = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates/simple.class.tpl';

    private string $className;

    public function __construct(string $className)
    {
        $this->className = ucfirst($className);
    }

    public function asString(): string
    {
        $templateContent = file_get_contents($this->template);

        return str_replace('{name}', $this->className, $templateContent);
    }
}
