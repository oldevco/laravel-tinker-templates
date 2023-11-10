<?php

use OldevCo\LaravelTinkerTemplates\Playground\Templates\SimpleClassTemplate;

return [
    /* relative path from project */
    'script_dir' => '/',

    'available_templates' => [
        'simple' => SimpleClassTemplate::class,
    ],

    'default_template' => 'simple',
];
