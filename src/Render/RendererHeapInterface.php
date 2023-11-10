<?php

namespace OldevCo\LaravelTinkerTemplates\Render;

interface RendererHeapInterface
{
    public function add(string $line): void;

    public function addEmpty(): void;
}
