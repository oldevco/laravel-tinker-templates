<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Parts;

use OldevCo\LaravelTinkerTemplates\Playground\PartRenderInterface;

class ScriptFilePart implements PartRenderInterface
{
    private string $namespace;

    private UsesPart $uses;

    private ClassPart $class;

    public function __construct(string $namespace, UsesPart $uses, ClassPart $class)
    {
        $this->namespace = $namespace;
        $this->uses      = $uses;
        $this->class     = $class;
    }

    public function render(): string
    {
        return <<<STR
<?php

namespace {$this->namespace};

{$this->uses->render()}

{$this->class->render()}

STR;
    }
}
