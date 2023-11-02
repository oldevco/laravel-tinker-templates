<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;

class ClassPart implements PartRenderInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render(): string
    {
        return <<<STR
class {$this->name}
{

}
STR;
    }
}
