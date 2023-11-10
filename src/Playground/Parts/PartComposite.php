<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class PartComposite implements PartRenderInterface
{
    private array $parts;

    public function __construct(PartRenderInterface ...$parts)
    {
        $this->parts = $parts;
    }

    public function render(RendererHeapInterface $renderer): void
    {
        foreach ($this->parts as $part) {
            $part->render($renderer);
        }
    }
}
