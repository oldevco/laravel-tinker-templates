<?php

namespace OldevCo\LaravelTinkerTemplates\Render;

class Renderer implements RendererHeapInterface, RenderFlushInterface
{
    /** @var string[] */
    private array $lines = [];

    public function add(string $line): void
    {
        $this->lines[] = $line;
    }

    public function addEmpty(): void
    {
        $this->lines[] = '';
    }

    public function asString(): string
    {
        $result = '';
        foreach ($this->lines as $line) {
            $result .= $line . PHP_EOL;
        }
        return $result;
    }
}
