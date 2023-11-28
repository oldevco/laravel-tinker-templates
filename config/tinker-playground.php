<?php

use OldevCo\LaravelTinkerTemplates\Playground\Templates\SimpleClassTemplate;

return [
    /* Storage::disk('local') path */
    'script_dir' => DIRECTORY_SEPARATOR . 'tinker-scripts',

    'available_templates' => [
        'simple' => SimpleClassTemplate::class,
    ],

    'default_template' => 'simple',
];
