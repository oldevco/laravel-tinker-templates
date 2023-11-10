<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class PropertyPart implements PartRenderInterface
{
    private string $name;

    private string $access;

    private string $type;

    /** @var mixed */
    private $default;

    public function __construct(string $name, string $access, string $type, $default = null)
    {
        $this->name   = $name;
        $this->access = $access;
        $this->type   = $type;

        if ($default !== null) {
            $this->default = $default;
        }
    }

    public function render(RendererHeapInterface $renderer): void
    {
        $default = isset($this->default) ? ' = ' . $this->default : '';

        $renderer->add(trim("{$this->access} {$this->type} \${$this->name} {$default}") . ';');
    }
}
