<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class MethodPart implements PartRenderInterface
{
    private string $name;

    private string $access;

    private string $returnType;

    private array $parameters;

    public function __construct(string $name, string $access, string $returnType, array $parameters)
    {
        $this->name       = $name;
        $this->access     = $access;
        $this->returnType = $returnType;
        $this->parameters = $parameters;
    }

    public function render(RendererHeapInterface $renderer): void
    {
        // TODO: Implement render() method.
    }
}
