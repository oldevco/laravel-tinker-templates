<?php

namespace OldevCo\LaravelTinkerTemplates\Playground;

use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

interface PartRenderInterface
{
    public function render(RendererHeapInterface $renderer): void;
}
