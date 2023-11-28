<?php

namespace OldevCo\LaravelTinkerTemplates\Playground;

interface TemplateFactoryInterface
{
    public function create(string $name, string $templateName): TemplateRenderInterface;
}
