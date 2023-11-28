<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class ClassPart implements PartRenderInterface
{
    private string $name;

    private PartComposite $properties;

    private PartComposite $methods;

    public function __construct(string $name, PartComposite $properties, PartComposite $methods)
    {
        $this->name       = $name;
        $this->properties = $properties;
        $this->methods    = $methods;
    }

    public function render(RendererHeapInterface $renderer): void
    {
        $renderer->add('class ' . $this->name);
        $renderer->add('{');
        $this->properties->render($renderer);
        $renderer->addEmpty();
        $this->methods->render($renderer);
        $renderer->addEmpty();
        $renderer->add('}');
    }

    public function getName(): string
    {
        return $this->name;
    }
}
