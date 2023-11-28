<?php

namespace OldevCo\LaravelTinkerTemplates\Playground;

use OldevCo\LaravelTinkerTemplates\Playground\Templates\SimpleClassTemplate;

class TemplateFactory implements TemplateFactoryInterface
{
    public function create(string $name, string $templateName): TemplateRenderInterface
    {
        $templates = config('tinker-playground.available_templates');
        if (!isset($templates[$templateName])) {
            throw new \InvalidArgumentException(sprintf('Template `%s` is not configured, please add it to configuration', $templateName));
        }

        $className = $templates[$templateName];

        return new $className($name);
    }
}
