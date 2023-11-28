<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;
use OldevCo\LaravelTinkerTemplates\Render\RendererHeapInterface;

class ScriptFilePart implements PartRenderInterface
{
    private string $namespace;

    private PartComposite $uses;

    private ClassPart $class;

    public function __construct(string $namespace, PartComposite $uses, ClassPart $class)
    {
        $this->namespace = $namespace;
        $this->uses      = $uses;
        $this->class     = $class;
    }

    public function render(RendererHeapInterface $renderer): void
    {
        $renderer->add('<?php');
        $renderer->addEmpty();
        $renderer->add('namespace ' . $this->namespace);
        $renderer->addEmpty();
        $this->uses->render($renderer);
        $renderer->addEmpty();
        $this->class->render($renderer);
        $renderer->addEmpty();

        $renderer->add(sprintf('$script = app()->make(%s::class);', $this->class->getName()));
        $renderer->add('$script();');
    }
}
