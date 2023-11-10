<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Templates;

use OldevCo\LaravelTinkerTemplates\Playground\Parts\ClassPart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\MethodPart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\PartComposite;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\PropertyPart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\ScriptFilePart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\UsePart;
use OldevCo\LaravelTinkerTemplates\Render\Renderer;

class SimpleClassTemplate
{
    public function something(): string
    {
        $properties = new PartComposite(
            new PropertyPart('test', 'private', 'string'),
            new PropertyPart('test2', 'private', 'string')
        );

        $methods = new PartComposite(
            new MethodPart('__construct', 'public', 'void', [])
        );

        $class = new ClassPart('TestClass', $properties, $methods);

        $uses = new PartComposite(
            new UsePart('Test')
        );

        $script = new ScriptFilePart('TestNamespace', $uses, $class);

        $renderer = new Renderer();

        $script->render($renderer);

        return $renderer->asString();
    }
}
