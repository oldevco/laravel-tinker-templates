<?php

namespace OldevCo\LaravelTinkerTemplates\Playground\Templates;

use OldevCo\LaravelTinkerTemplates\Playground\Parts\ClassPart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\ScriptFilePart;
use OldevCo\LaravelTinkerTemplates\Playground\Parts\UsesPart;

class SimpleClassTemplate
{
    public function something(): string
    {
        $class = new ClassPart('TestClass');

        $script = new ScriptFilePart('TestNamespace', new UsesPart([]), $class);

        return $script->render();
    }
}
