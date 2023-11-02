<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;

class UsesPart implements PartRenderInterface
{
    private array $uses;

    public function __construct(array $uses)
    {
        $this->uses = $uses;
    }

    public function render(): string
    {
        return implode(PHP_EOL, array_map(fn (string $useName) => 'use ' . $useName, $this->uses));
    }
}
