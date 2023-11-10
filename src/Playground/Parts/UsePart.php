<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class UsePart implements PartRenderInterface
{
    private string $name;

    private ?string $alias;

    public function __construct(string $name, string $alias = null)
    {
        $this->name  = $name;
        $this->alias = $alias;
    }

    public function render(RendererHeapInterface $renderer): void
    {
        $renderer->add('use ' . $this->name . ';');
    }
}
